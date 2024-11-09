<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\UserOrderItem;
use App\Models\TrackBlock;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Exception;

use YooKassa;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class PaymentController extends Controller
{
    function index( Request $request ) {
        $validated = $request->validate([
            'id' => 'required|integer',
            'type' => 'required|string',
            'payment' => 'required|string',
        ]);

        $total = 0;
        $customer_phone = '';
        $customer_email = '';

        if ( $validated['type'] == 'order' ) {
            $order = UserOrder::where('id',$validated['id'])->first();
            if ( $order ) {
                $total = $order->total;
                $customer_phone = $order->phone;
                $customer_email = $order->email;
            }
        }

        if ( $total == 0 ) {
            exit();
        }

        if ( $validated['payment'] == 'yookassa' ) {
            $client = new YooKassa\Client();
            $client->setAuth(config("app.yandex_account"), config("app.yandex_key"));
    
            $response = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => $total,
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => route('payment-result'),
                    ),
                    'capture' => true,
                    'description' => 'Order #' . $validated['id'],
                ),
                uniqid('', true)
            );
    
            $url = $response->getConfirmation()->getConfirmationUrl();

            $form = '<meta http-equiv="refresh" content="2; url=' . $url . '" />';
        }

        if ( $validated['payment'] == 'paypal' ) {

            if ( app()->getLocale() == 'ru' ) {
                $currency = 'USD';
                $total = $total / 70;
            } else {
                $currency = 'USD';
            }
            
            $form = '<form method="post" name="process" action="https://www.paypal.com/cgi-bin/webscr">
                <input type="hidden" name="rm" value="2"/>
                <input type="hidden" name="cmd" value="_xclick"/>
                <input type="hidden" name="amount" value="' . number_format( $total,2) . '"/>
                <input type="hidden" name="business" value="' . config("app.paypal_account") . '"/>
                <input type="hidden" name="cancel_return" value="' . route('payment-fail') . '"/>
                <input type="hidden" name="notify_url" value="' . route('payment-paypal-notification') . '"/>
                <input type="hidden" name="return" value="' . route('payment-result') . '"/>
                <input type="hidden" name="item_name" value="Order #' . $validated['id'] . '"/>
                <input type="hidden" name="item_number" value="' .  $validated['id'] . '"/>
                <input type="hidden" name="currency_code" value="' . $currency . '"/>
            </form>';
            
        }

        if ( $validated['payment'] == 'prodamus' ) {

            $linktoform = config("app.prodamus_url");

            if ( app()->getLocale() != 'ru' ) {
                $total = $total * 70;
            }


            // Секретный ключ. Можно найти на странице настроек, 
            // в личном кабинете платежной формы.
            $secret_key = config("app.prodamus_key");
            
            $data = [
                // хххх - номер заказ в системе интернет-магазина
                'order_id' => $validated['type'] . '-' . $validated['id'],
            
                // +7хххххххххх - мобильный телефон клиента
                'customer_phone' => @$customer_phone,
            
                // ИМЯ@prodamus.ru - e-mail адрес клиента
                'customer_email' => @$customer_email,
            
                // перечень товаров заказа
                'products' => [
                    [
                        // id товара в системе интернет-магазина 
                        //    (не обязательно) - при необходимоти прописать 
                        'sku' => $validated['type'] . '-' . $validated['id'],
            
                        // название товара - необходимо прописать название вашего товара 
                        //          (обязательный параметр)
                        'name' => 'Order #' . $validated['id'],
            
                        // цена за единицу товара, 123 - значение, которое нужно прописать
                        //      (обязательный параметр)
                        'price' => number_format( $total,2,'.',''),
            
                        // количество товара, х - значение, которое нужно прописать
                        //           (обязательный параметр)
                        'quantity' => 1,
            
                        // данные о налоге
                        // (не обязательно, если не указано будет взято из настроек Магазина 
                        //  на стороне системы)
                        'tax' => [
                            
                            // ставка НДС, с возможными значениями (при необходимоти заменить):
                            //	0 – без НДС;
                            //	1 – НДС по ставке 0%;
                            //	2 – НДС чека по ставке 10%;
                            //	3 – НДС чека по ставке 18%;
                            //	4 – НДС чека по расчетной ставке 10/110;
                            //	5 – НДС чека по расчетной ставке 18/118.
                            //	6 - НДС чека по ставке 20%;
                            //	7 - НДС чека по расчётной ставке 20/120.
                            'tax_type' => 0,

                        
                        ],
            
                        // Тип оплаты, с возможными значениями (при необходимости заменить):
                        //	1 - полная предварительная оплата до момента передачи предмета расчёта;
                        //	2 - частичная предварительная оплата до момента передачи 
                        //      предмета расчёта;
                        //	3 - аванс;
                        //	4 - полная оплата в момент передачи предмета расчёта;
                        //	5 - частичная оплата предмета расчёта в момент его передачи 
                        //      с последующей оплатой в кредит;
                        //	6 - передача предмета расчёта без его оплаты в момент 
                        //      его передачи с последующей оплатой в кредит;
                        //	7 - оплата предмета расчёта после его передачи с оплатой в кредит.
                        // (не обязательно, если не указано будет взято из настроек 
                        //     Магазина на стороне системы)
                        'paymentMethod' => 1,
            
                        // Тип оплачиваемой позиции, с возможными 
                        //     значениями (при необходимости заменить):
                        //	1 - товар;
                        //	2 - подакцизный товар;
                        //	3 - работа;
                        //	4 - услуга;
                        //	5 - ставка азартной игры;
                        //	6 - выигрыш азартной игры;
                        //	7 - лотерейный билет;
                        //	8 - выигрыш лотереи;
                        //	9 - предоставление РИД;
                        //	10 - платёж;
                        //	11 - агентское вознаграждение;
                        //	12 - составной предмет расчёта;
                        //	13 - иной предмет расчёта.
                        // (не обязательно, если не указано будет взято из настроек Магазина на стороне системы)
                        'paymentObject' => 1,
                    ],
                ],
                

            
                // для интернет-магазинов доступно только действие "Оплата"
                'do' => 'pay',
            
                // url-адрес для возврата пользователя без оплаты 
                //           (при необходимости прописать свой адрес)
                'urlReturn' => route('payment-fail') ,
            
                // url-адрес для возврата пользователя при успешной оплате 
                //           (при необходимости прописать свой адрес)
                'urlSuccess' => route('payment-result'),
            
                // служебный url-адрес для уведомления интернет-магазина 
                //           о поступлении оплаты по заказу
                // 	         пока реализован только для Advantshop, 
                //           формат данных настроен под систему интернет-магазина
                //           (при необходимости прописать свой адрес)
                'urlNotification' => route('payment-paypal-notification'),
            

            
                // сумма скидки на заказ
                // 	     указывается только в том случае, если скидка 
                //       не прменена к товарным позициям на стороне интернет-магазина
                // 	     алгоритм распределения скидки по товарам 
                //       настраивается на стороне пейформы
                'discount_value' => 0.00,
                
                // тип плательщика, с возможными значениями:
                //     FROM_INDIVIDUAL - Физическое лицо
                //     FROM_LEGAL_ENTITY - Юридическое лицо
                //     FROM_FOREIGN_AGENCY - Иностранная организация
                //     (не обязательно. если форма работает в режиме самозанятого 
                //      значение по умолчанию: FROM_INDIVIDUAL)
                'npd_income_type' => 'FROM_INDIVIDUAL',

            ];
            
            
            $data['signature'] = Hmac::create($data, $secret_key);
            
            $url = sprintf('%s?%s', $linktoform, http_build_query($data));


            $form = '<meta http-equiv="refresh" content="2; url=' . $url . '" />';
        }

        return view('payment',compact('form'));
    }

    function result() {
        return view('payment_result');
    }

    function fail() {
        return view('payment_fail');
    }

    function paypalNotification( Request $request ) {
        global $_POST;

        $postdata = "";

		$validate_ipn = array('cmd' => '_notify-validate');

		foreach ( $_POST as $key => $value ) {
			$postdata .= $key . "=" . urlencode( $value ) . "&";
			$validate_ipn[ $key ] = urlencode( $value );
		}

		$postdata .= "cmd=_notify-validate";

        //file_put_contents( storage_path('app/data.txt'), $postdata);
/*
$postpata = "mc_gross=1.00&protection_eligibility=Eligible&address_status=confirmed&payer_id=7TD5TPAN5EEUQ&address_street=Villa+GDE&payment_date=05%3A22%3A04+Jul+26%2C+2024+PDT&payment_status=Completed&charset=UTF-8&address_zip=80571&first_name=Stanislav&mc_fee=0.35&address_country_code=ID&address_name=Stanislav+Deev&notify_version=3.9&custom=&payer_status=unverified&business=liana_rudny%40mail.ru&address_country=Indonesia&address_city=Ubud&quantity=1&verify_sign=AtRMDSNi5rr5-VzWy-.Oha6TVI6iAdWHTDWZWmlNUCTZv5LmH-SGYr6h&payer_email=stanislavdeev%40gmail.com&txn_id=5U413176NH4256358&payment_type=instant&payer_business_name=Stanislav+Deev&last_name=Deev&address_state=BALI&receiver_email=liana_rudny%40mail.ru&payment_fee=0.35&shipping_discount=0.00&insurance_amount=0.00&receiver_id=LUC9XKYS4C68Q&txn_type=web_accept&item_name=Order+%23149&discount=0.00&mc_currency=USD&item_number=149&residence_country=ID&shipping_method=Default&transaction_subject=&payment_gross=1.00&ipn_track_id=0208509831668&cmd=_notify-validate";
*/

        $curl = curl_init( 'https://ipnpb.paypal.com/cgi-bin/webscr' );
        curl_setopt( $curl, CURLOPT_POST, 1 );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $postdata );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 1 );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 2 );
        //curl_setopt( $curl, CURLOPT_FORBID_REUSE, 1 );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Connection: Close' ) );
        $response = curl_exec( $curl );
        curl_close( $curl );

/*
var_dump($response);
$_REQUEST["payment_status"] = "Completed";
$_REQUEST["txn_type"] = "web_accept";
$_REQUEST["item_number"] = 149;
*/
            

		if ($_REQUEST["payment_status"] == "Completed" and ( $_REQUEST["txn_type"] == "web_accept" or $_REQUEST["txn_type"] == "cart" or $_REQUEST["txn_type"] == "send_money" ) ) {
            $this->approvePayment( (int)$_REQUEST["item_number"] );
        }
       
    }
 
    function yookassaNotification( Request $request ) {
        $source = $request->getContent();

        $requestBody = json_decode($source,true);

        try {
            $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
              ? new NotificationSucceeded($requestBody)
              : new NotificationWaitingForCapture($requestBody);
              
        } catch (Exception $e) {
            
        }
        
        
        $payment = $notification->getObject();


        
        if ( $payment->status == 'succeeded' ) {
            file_put_contents( storage_path('app/data.txt'), '3' );
            $result = explode( "#", $payment->description );
            $id = ( int )@$result[1];
            //file_put_contents( storage_path('app/data.txt'), $id );
            $this->approvePayment( $id );
        }

        return response()->setStatusCode()->json;
    }


    function prodamusNotification( Request $request ) {
        $secret_key = config("app.prodamus_key");
        $headers = apache_request_headers();

        //file_put_contents( storage_path('app/data.txt'), json_encode($_POST) . $headers['Sign']);
        
        try {
            if ( empty($_POST) ) {
                throw new Exception('$_POST is empty');
            }
            elseif ( empty($headers['Sign']) ) {
                throw new Exception('signature not found');
            }
            elseif ( !Hmac::verify($_POST, $secret_key, $headers['Sign']) ) {
                throw new Exception('signature incorrect');
            }
            $result = explode( "-", $_POST['order_num'] );
            $id = ( int )@$result[1];
            $this->approvePayment( $id );

            http_response_code(200);

        }
        catch (Exception $e) {
            http_response_code($e->getCode() ? $e->getCode() : 400);
            printf('error: %s', $e->getMessage());
        }
    }

    function approvePayment( $id ) {
        $order = UserOrder::where('id',$id)->where('status',0)->first();
        if ( $order ) {
            $order->status = 1;
            $order->save();
            $items = UserOrderItem::where('order_id',$id)->get();
            if ( $items ) {
                foreach ( $items as $item ) {
                    $newBlockTrack = new TrackBlock;
                    $newBlockTrack->track_item_id = $item->track_id;
                    $newBlockTrack->location_item_id = $order->location_id;
                    $newBlockTrack->blocked_before = date('Y-m-d', strtotime('+1 year'));
                    $newBlockTrack->save();
                }
            }
            Mail::to($order->email)->send(new OrderMail($order));
        }
    }
}



class Hmac {
    static function create($data, $key, $algo = 'sha256') {
        if (!in_array($algo, hash_algos()))
            return false;
        $data = (array) $data;
        array_walk_recursive($data, function(&$v){
            $v = strval($v);
        });
        self::_sort($data);
        if (version_compare(PHP_VERSION, '5.4.0', '<')) {
            $data = preg_replace_callback('/((\\\u[01-9a-fA-F]{4})+)/', function ($matches) {
                return json_decode('"'.$matches[1].'"');
            }, json_encode($data));
        }
        else {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        return hash_hmac($algo, $data, $key);
    }
 
    static function verify($data, $key, $sign, $algo = 'sha256') {
        $_sign = self::create($data, $key, $algo);
        return ($_sign && (strtolower($_sign) == strtolower($sign)));
    }
 
    static private function _sort(&$data) {
        ksort($data, SORT_REGULAR);
        foreach ($data as &$arr)
            is_array($arr) && self::_sort($arr);
    }
}

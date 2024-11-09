<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\CartItem;
use App\Models\LocationItem;
use App\Models\TrackBlock;
use App\Models\TrackItem;
use App\Models\UserOrder;
use App\Models\UserOrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartComponent extends Component
{
    protected $listeners = ['addToCart' => 'addToCartItem', 'showCartMobile' => 'showCart'];

    public $locationsAll = [];
    public $locationsTotal = [];
    public $searchLoc = '';

    public $order_name, $order_email, $order_phone, $order_location,$order_payment;

    protected $rules = [
        'order_name' => 'required|string',
        'order_email' => 'required|email',
        'order_phone' => 'required|string',
        'order_location' => 'required|integer',
        'order_payment' => 'required|string',
    ];
    protected $messages = [
        'order_name.required' => 'Введите имя',
        'order_email.required' => 'Введите email',
        'order_email.email' => 'Введите корректный email',
        'order_phone.required' => 'Введите номер телефона',
        'order_location.required' => 'Выберите регион',
        'order_payment.required' => 'Выберите метод платежа',
    ];




    public function mount()
    {
        $this->locationsAll = LocationItem::where('parent_id', null)->orderBy('sort_order')->orderBy('id')->get();
        $this->locationsTotal = LocationItem::orderBy('sort_order')->get();
    }


    public function showCart()
    {
        $this->order_location = Session::get('user_location_id');
        $user = Auth::user();
        if($user){
            $this->order_email = $user->email;
            $this->order_name = $user->name;
            $this->order_phone = $user->phone;
        }
        $this->dispatchBrowserEvent('show-cart-modal');
    }


    public function addOrder()
    {
        if ( session()->get('user_location_id') > 0 ) {
            $this->order_location = session()->get('user_location_id');
        }
        
        $this->validate();

        $session = Session::getId();

        $user = Auth::user();
        $cartItems = CartItem::where('session', $session)->get();

        $newOrder = new UserOrder;

        $newOrder->user_id = $user ? $user->id : null;
        $newOrder->name = $this->order_name;
        $newOrder->email = $this->order_email;
        $newOrder->phone = $this->order_phone;
        $newOrder->location_id = $this->order_location;
        $total = 0;
        foreach ($cartItems as $i) {
            if ( app()->getLocale() == 'ru' ) {
                $total += $i->price;
            } else {
                $total += $i->price_usd;
            }
        }
        $newOrder->total = $total;
        $newOrder->status = 0;
        $newOrder->save();
     
        foreach ($cartItems as $item) {
            $newOrderItem = new UserOrderItem;
            $newOrderItem->order_id = $newOrder->id;
            $newOrderItem->track_id = $item->track_item_id;
            $newOrderItem->save();

            //Block only after an successful transaction
            /*
            $newBlockTrack = new TrackBlock;
            $newBlockTrack->track_item_id = $item->track_item_id;
            $newBlockTrack->location_item_id = $this->order_location;
            $newBlockTrack->blocked_before = date('Y-m-d', strtotime('+1 year'));
            $newBlockTrack->save();
            */
        }
        
        //Mail::to($newOrder->email)->send(new OrderMail($newOrder));
        
        $cartItems->map->delete();
        $this->emit('refreshTracks');
        //$this->dispatchBrowserEvent('close-cart-modal');
        //$this->dispatchBrowserEvent('show-order-added-toast');
        /*
        if ( app()->getLocale() == 'ru' ) {
            $method = 'yookassa';
        } else {
            $method = 'paypal';
        }
        */
       
        return redirect('/payment/?id=' . $newOrder->id . '&type=order&payment=' . $this->order_payment);
    }

    public function setLocation($locId)
    {
        $selectedLocation = LocationItem::find($locId);
        Session::put('user_location_id', $selectedLocation->id);
        Session::put('user_location_title', $selectedLocation->title . ' ' . $selectedLocation->subj);

        if ( Auth::check() ) {
            $user = auth()->user();
            $user->location_id = $selectedLocation->id;
            $user->save();
        }

        $this->searchLoc = '';
        $this->emit('refreshTracks');
        $this->dispatchBrowserEvent('close-location-modal');
    }

    public function addToCartItem($id)
    {
        $session = Session::getId();
        if (CartItem::where(['session' => $session, 'track_item_id' => $id])->exists()) {
            $this->dispatchBrowserEvent('show-already-toast');
            return;
        }

        $track = TrackItem::find($id);
        $newCartItem = new CartItem;
        $newCartItem->session = $session;
        $newCartItem->track_item_id = $track->id;
        $newCartItem->price = $track->price;
        $newCartItem->price_usd = $track->price_usd;
        $newCartItem->save();
        $this->dispatchBrowserEvent('show-added-toast');
    }
    public function showLocationModal(){
        
        $this->dispatchBrowserEvent('show-location-modal');
}
    public function removeFromCart($id)
    {
        CartItem::where('track_item_id', $id)->delete();
    }

    public function render()
    {
        $session = Session::getId();
        $cartItems = CartItem::where('session', $session)->get();
        $cartCount = count($cartItems);
        $total = 0;
        foreach ($cartItems as $i) {
            $total += $i->price;
        }
        $total_usd = 0;
        foreach ($cartItems as $i) {
            $total_usd += $i->price_usd;
        }
        $locations = [];
        if ($this->searchLoc != '') {
            $locations = LocationItem::where('title', 'like', '%' . $this->searchLoc . '%')->orWhere('title_en', 'like', '%' . $this->searchLoc . '%')->orderBy('sort_order')->orderBy('id')->get();
        } else {
            $locations = $this->locationsAll;
        }
        $userLocationId = Session::get('user_location_id');
        $userLocation = null;
        if($userLocationId){
            $userLocation = LocationItem::find($userLocationId);
        }
        
        $userLocationName = Session::get('user_location_title');
        return view('livewire.cart-component', ['total'=> $total, 'total_usd' => $total_usd, 'items' => $cartItems, 'cart_count' => $cartCount, 'user_location_id' => $userLocationId, 'user_location' => $userLocation, 'locations' => $locations, 'user_location_title' => $userLocationName]);
    }
}

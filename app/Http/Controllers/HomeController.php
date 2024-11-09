<?php

namespace App\Http\Controllers;

use App\Models\FeedbackItem;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->defaultLocale();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('landing');
    }
    public function about()
    {
        return view('about');
    }
    public function contacts()
    {
        
        return view('contacts');
    }
    public function reviews()
    {
        $all = FeedbackItem::all();
        return view('reviews', array('items' => $all));
    }
    public function performance()
    {
        $items = Performance::all();
        return view('performance', ['items' => $items]);
    }
    public function services()
    {
        return view('services');
    }
    public function account()
    {
        return view('account');
    }
    public function privacy()
    {
        return view('privacy');
    }

    public function oferta()
    {
        return view('oferta');
    }

    function defaultLocale() {
        if ( session('locale') == '' ) {
            App::setLocale('ru');
            Session::put('locale', 'ru');
        }
    }

    public function changeLocale($locale)
    {
       
        if (!in_array($locale, ['ru', 'en'])) {
            abort(404);
        }

        App::setLocale($locale);


        if ( Auth::check() ) {
            $user = auth()->user();
            $user->language = $locale;
            $user->save();
        }


        // Session
        session()->put('locale', $locale);
        //  return 'Redirect from:' .  request()->headers->get('referer');
        //return redirect(request()->headers->get('referer'));
        //return redirect()->back()->with('success', 'Your language has been changed');;
        if ( request()->headers->get('referer') != '' ) {
            $url = explode('?',  request()->headers->get('referer') );
            if ( $url[0] != '' ) {
                $u = $url[0];
                if ( $u[strlen($u)-1] != '/') {
                    $u .= '/';
                }
                return redirect( $u . '?t=' . time());
            }           
        }
        return redirect('/?t=' . time());

    }

    public function lang($language)
    {
        if (!in_array($language, ['ru', 'en', 'rus'])) {
            abort(404);
        }

        if ( $language == 'rus' ) {
            $language = 'ru';
        }

        App::setLocale($language);

        Session::put('locale', $language);

        Artisan::call('view:clear');

        return redirect('/');
    }


}

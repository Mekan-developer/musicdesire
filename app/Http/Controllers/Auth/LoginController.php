<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        

        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);

     

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if ( auth()->user()->location_id > 0 ) {
                Session::put('user_location_id', auth()->user()->location_id);
                Session::put('user_location_title', auth()->user()->location->title . ' ' . auth()->user()->location->subj);                
            }

        
            if ( auth()->user()->language != '' ) {
                App::setLocale(auth()->user()->language);

                Session::put('locale', auth()->user()->language);
            } else {
                $user = auth()->user();
                $user->language = 'ru';
                $user->save();

                App::setLocale('ru');
                Session::put('locale', 'ru');
            }

            return redirect('/');

        }

        return redirect("login")->withSuccess('You have entered invalid credentials');

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // if (session()->has('locale')) {
        //    App::setlocale(session()->get('locale'));
        //    session()->put('locale', session()->get('locale'));
        // }
        //  else {
        //    App::setlocale('ru');
        // }
        $locale = $request->session()->get('locale') ?? 'ru';
        app()->setLocale($locale);
        return $next($request);
    }
}

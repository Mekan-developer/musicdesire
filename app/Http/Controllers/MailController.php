<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ApplicationMail;

class MailController extends Controller
{
    public function index(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $scs = 'Ваша форма отправлена успешно!';

        try {
            Mail::to('hookzzopoj@gmail.com')->send(new ApplicationMail($fields));
        } catch (\Throwable $th) {
            $scs = 'err';
        }
        // Mail::to('hookzzopoj@gmail.com')->send(new ApplicationMail([
        //     'title' => 'The Title',
        //     'body' => 'The Body',
        // ]));
    }
}
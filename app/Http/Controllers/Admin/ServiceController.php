<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function index()
    {
        // $all = UserApply::all();
        return view('admin.service.index');
    }
}

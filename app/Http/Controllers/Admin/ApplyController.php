<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserApply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    function index()
    {
        $all = UserApply::all();
        return view('admin.apply.index', ['all' => $all]);
    }
}

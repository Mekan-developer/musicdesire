<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserOrder;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index() {
        $all = UserOrder::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', ['all' => $all]);
    }
}

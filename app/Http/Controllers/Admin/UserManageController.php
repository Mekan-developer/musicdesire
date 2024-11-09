<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    function index()
    {
        $all = User::all();
        return view('admin.users.index', ['all' => $all]);
    }

    function switch_status($id)
    {
        $u = User::find($id);
        if ($u->status == 1) {
            $u->status = 0;
            $u->save();
            return redirect('/admin/users')->with('success', 'Пользователь ' . $u->name . ' отключен');
        } else {
            $u->status = 1;
            $u->save();
            return redirect('/admin/users')->with('success', 'Пользователь ' . $u->name . ' активен');

        }

    }
    function switch_access($id)
    {
        $u = User::find($id);
        if ($u->admin == 1) {
            $u->admin = 0;
            $u->save();
            return redirect('/admin/users')->with('success', 'Пользователю ' . $u->name . ' отозван доступ администратора');
        } else {
            $u->admin = 1;
            $u->save();
            return redirect('/admin/users')->with('success', 'Пользователю ' . $u->name . ' разрешен доступ администратора');
        }

    }
}

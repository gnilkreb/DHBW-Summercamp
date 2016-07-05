<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{

    public function index()
    {
        $users = User::all()->where('role', 'admin');

        return view('admin.login', [
            'pages' => [],
            'users' => $users
        ]);
    }

}
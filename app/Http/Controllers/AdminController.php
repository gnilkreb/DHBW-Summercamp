<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login()
    {
        $users = User::where('admin', true)->get();

        return view('admin.login', ['pages' => [], 'users' => $users]);
    }

    public function authenticate(Request $request)
    {
        $userId = $request->user;
        $password = $request->password;

        if (Auth::attempt(['id' => $userId, 'password' => $password, 'admin' => 1])) {
            return redirect()->intended('admin.dashboard');
        }
    }

}

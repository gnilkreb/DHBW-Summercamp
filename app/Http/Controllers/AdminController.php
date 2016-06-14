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

        return view('admin.login', ['users' => $users]);
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();

        if (Auth::attempt(['first_name' => '', 'last_name' => '', 'password' => '', 'admin' => true])) {
            return redirect()->intended('admin.dashboard');
        }
    }

}

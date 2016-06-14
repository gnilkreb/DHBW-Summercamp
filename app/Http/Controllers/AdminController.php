<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;

class AdminController extends Controller
{

    public function authenticate()
    {
        if (Auth::attempt(['first_name' => '', 'last_name' => '', 'password' => '', 'admin' => true])) {
            return redirect()->intended('admin.dashboard');
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::user()) {
            return redirect('/categories');
        }

        return view('home', [
            'register' => Option::register()
        ]);
    }

}
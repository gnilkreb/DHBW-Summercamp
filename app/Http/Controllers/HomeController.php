<?php

namespace App\Http\Controllers;

use App\Option;

class HomeController extends Controller
{

    public function index()
    {
        $register = true;
        $option = Option::where('key', 'register')->first();

        if ($option) {
            $register = $option->value === '1';
        }

        return view('home', [
            'register' => $register
        ]);
    }

}
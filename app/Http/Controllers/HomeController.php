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
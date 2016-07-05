<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Auth;
use Carbon\Carbon;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login', [
            'users' => User::all()
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        Auth::login($user);

        return redirect('/categories');
    }

    public function login(LoginRequest $request)
    {
        $userId = $request->user_id;
        $user = User::findOrFail($userId);

        Auth::login($user);

        $user->login_at = Carbon::now();

        $user->save();

        return redirect()->intended('/categories');
    }

}

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
        return view('auth.register', User::schoolsAndGrades());
    }

    public function showLogin()
    {
        return view('auth.login', [
            'users' => User::all()
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $alwaysRemember = true;

        Auth::login($user, $alwaysRemember);

        return redirect('/categories');
    }

    public function login(LoginRequest $request)
    {
        $userId = $request->user_id;
        $password = $request->password;
        $alwaysRemember = true;

        if (Auth::guard('web')->attempt(['id' => $userId, 'password' => $password], $alwaysRemember)) {
            $user = User::findOrFail($userId);
            $user->login_at = Carbon::now();

            $user->save();

            $intended = $request->get('redirect');

            return redirect()->intended($intended);
        }

        return redirect()->back()->withErrors(['password' => 'Falsches Passwort']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

}

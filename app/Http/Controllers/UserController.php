<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->all());

        Auth::login($user);

        return redirect('categories');
    }

    public function login()
    {
        return view('auth.login', ['users' => User::all()]);
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'user' => 'required|numeric' 
        ]);
        
        $userId = $request->user_id;
        $user = User::findOrFail($userId);

        Auth::login($user);

        return redirect()->intended('categories');
    }
    
}

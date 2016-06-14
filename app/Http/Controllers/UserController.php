<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRegisterRequest;
use App\User;

class UserController extends Controller
{

    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->age = $request->age;
        $user->gender = $request->gender;

        $user->save();
    }
    
}

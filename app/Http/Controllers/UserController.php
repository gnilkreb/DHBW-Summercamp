<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'age' => 'required|numeric|min:1|max:99',
            'gender' => 'required|boolean'
        ], [], [
            'first_name' => 'Vorname',
            'last_name' => 'Nachname',
            'age' => 'Alter',
            'gender' => 'Geschlecht'
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->age = $request->age;
        $user->gender = $request->gender;

        $user->save();
    }
    
}

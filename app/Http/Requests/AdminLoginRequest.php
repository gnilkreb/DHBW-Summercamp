<?php

namespace App\Http\Requests;

class AdminLoginRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Passwort'
        ];
    }

}
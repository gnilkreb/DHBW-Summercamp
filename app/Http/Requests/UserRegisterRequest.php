<?php

namespace App\Http\Requests;

class UserRegisterRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|min:3|max:20',
            'last_name' => 'required|min:3|max:20',
            'age' => 'required|numeric|min:1|max:99',
            'gender' => 'required|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'Vorname',
            'last_name' => 'Nachname',
            'age' => 'Alter',
            'gender' => 'Geschlecht'
        ];
    }

}

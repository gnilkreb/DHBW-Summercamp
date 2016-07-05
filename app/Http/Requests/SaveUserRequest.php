<?php

namespace App\Http\Requests;

class SaveUserRequest extends Request
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
            'password' => 'string',
            'age' => 'required|numeric|min:1|max:99',
            'gender' => 'required|boolean',
            'school' => 'string',
            'grade' => 'numeric|min:1|max:13'
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'Vorname',
            'last_name' => 'Nachname',
            'password' => 'Passwort',
            'age' => 'Alter',
            'gender' => 'Geschlecht',
            'school' => 'Schule',
            'grade' => 'Klasse'
        ];
    }

}

<?php

namespace App\Http\Requests;

class CreateLevelRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'category_id' => 'required|numeric',
            'order' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Titel',
            'category_id' => 'Kategorie',
            'order' => 'Reihenfolge'
        ];
    }

}

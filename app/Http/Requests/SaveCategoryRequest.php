<?php

namespace App\Http\Requests;

class SaveCategoryRequest extends Request
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
            'name' => 'required|unique:categories',
            'image_url' => 'required|url'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'image_url' => 'Bild URL',
            'active' => 'Aktiv'
        ];
    }

}

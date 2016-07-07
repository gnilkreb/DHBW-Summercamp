<?php

namespace App\Http\Requests;

class SaveAnswerRequest extends Request
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
            'task_id' => 'required|numeric',
            'label' => 'required|string',
            'correct' => 'required|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'task_id' => 'Aufgabe',
            'label' => 'Antwort',
            'correct' => 'Richtig'
        ];
    }

}

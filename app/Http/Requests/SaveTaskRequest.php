<?php

namespace App\Http\Requests;

class SaveTaskRequest extends Request
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
            'level_id' => 'required|numeric',
            'difficulty' => 'required|numeric|min:1|max:3',
            'content' => 'required|string',
            'youtube_url' => 'string',
            'pdf_url' => 'string',
            'finish_type' => 'required|numeric|min:0|max:2'
        ];
    }

    public function attributes()
    {
        return [
            'level_id' => 'Level',
            'difficulty' => 'Schwierigkeitsgrad',
            'content' => 'Inhalt',
            'youtube_url' => 'YouTube URL',
            'pdf_url' => 'PDF URL',
            'finish_type' => 'Abgabe'
        ];
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Requests\SaveAnswerRequest;

class AnswerController extends BaseController
{

    public function save(SaveAnswerRequest $request)
    {
        Answer::create($request->all());

        return redirect()->back();
    }

    public function delete($id)
    {
        Answer::destroy($id);

        return response()->json(true);
    }

}
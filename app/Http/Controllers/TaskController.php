<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends BaseController
{

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('task', [
            'task' => $task
        ]);
    }

    public function request($id, Request $request)
    {
        
    }

}

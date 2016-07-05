<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends BaseController
{

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('task', [
            'task' => $task
        ]);
    }

}

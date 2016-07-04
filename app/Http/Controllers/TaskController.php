<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTaskRequest;
use App\Level;
use App\Task;

class TaskController extends AdminBaseController
{

    public function show($id = null)
    {
        $task = new Task();
        $new = true;
        $levels = Level::all();

        if ($id !== null) {
            $task = Task::findOrFail($id);
            $new = false;
        }

        return $this->adminView('task', [
            'task' => $task,
            'new' => $new,
            'levels' => $levels
        ]);
    }

    public function save(SaveTaskRequest $request)
    {
        $task = Task::firstOrNew(['id' => $request->get('id')]);

        $task->fill($request->all());
        $task->save();

        return redirect('/admin/levels');
    }

    public function delete($id)
    {
        Task::destroy($id);

        return response()->json(true);
    }

}
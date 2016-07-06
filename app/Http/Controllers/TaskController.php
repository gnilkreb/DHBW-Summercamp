<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\RequestsController;
use App\Task;
use Illuminate\Http\Request;
use Vinkla\Pusher\Facades\Pusher;

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
        Task::create([
            'user_id' => $request->user()->id,
            'task_id' => $id
        ]);

        $payload = RequestsController::requestsPayload();

        Pusher::trigger('admin', 'requests', $payload);

        return response(200);
    }

}

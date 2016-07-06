<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\RequestsController;
use App\Task;
use App\TaskRequest;
use Illuminate\Http\Request;
use Pusher;

class TaskController extends BaseController
{

    private $pusher;

    public function __construct()
    {
        $options = [
            'cluster' => 'eu',
            'encrypted' => true
        ];
        $this->pusher = new Pusher(env('PUSHER_KEY'), env('PUSHER_SECRET'), env('PUSHER_APP_ID'), $options);
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('task', [
            'task' => $task
        ]);
    }

    public function request($id, Request $request)
    {
        TaskRequest::create([
            'user_id' => $request->user()->id,
            'task_id' => $id
        ]);

        $payload = RequestsController::requestsPayload();

        $this->pusher->trigger('admin', 'requests', $payload);

        return response(200);
    }

}

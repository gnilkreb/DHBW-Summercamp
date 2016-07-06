<?php

namespace App\Http\Controllers\Admin;

use App\FinishedTask;
use App\TaskRequest;
use Illuminate\Http\Request;

class RequestsController extends BaseController
{

    static public function requestsPayload()
    {
        $requests = TaskRequest::where('done', 0)->orderBy('created_at', 'asc')->get();
        $count = $requests->count();
        $html = view('partials.requests', [
            'requests' => $requests
        ])->render();

        return [
            'count' => $count,
            'html' => $html
        ];
    }

    public function index()
    {
        return $this->adminView('requests');
    }

    public function requests()
    {
        $payload = RequestsController::requestsPayload();

        return response()->json([
            'data' => $payload
        ]);
    }

    public function save($id, Request $request)
    {
        $this->validate($request, [
            'accept' => 'required|boolean'
        ]);

        $taskRequest = TaskRequest::findOrFail($id);
        $accept = $request->get('accept');
        $taskRequest->done = true;

        $taskRequest->save();

        if ($accept === 'true') {
            FinishedTask::create([
                'user_id' => $taskRequest->user_id,
                'task_id' => $taskRequest->task_id
            ]);
        }

        return response(200);
    }

}
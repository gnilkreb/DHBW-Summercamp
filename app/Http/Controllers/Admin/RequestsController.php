<?php

namespace App\Http\Controllers\Admin;

use App\FinishedTask;
use App\TaskRequest;
use Illuminate\Http\Request;
use Pusher;

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

    private $pusher;

    public function __construct()
    {
        parent::__construct();

        $options = [
            'cluster' => 'eu',
            'encrypted' => true
        ];
        $this->pusher = new Pusher(env('PUSHER_KEY'), env('PUSHER_SECRET'), env('PUSHER_APP_ID'), $options);
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
            'accept' => 'required'
        ]);

        $taskRequest = TaskRequest::findOrFail($id);
        $accept = $request->get('accept');
        $taskRequest->done = true;

        $taskRequest->save();
        $this->pusher->trigger('admin', 'requests', RequestsController::requestsPayload());

        if ($accept === 'true') {
            $this->pusher->trigger('frontend', 'finished', [
                'userId' => $taskRequest->user_id,
            ]);

            FinishedTask::create([
                'user_id' => $taskRequest->user_id,
                'task_id' => $taskRequest->task_id
            ]);
        }

        return response(200);
    }

}
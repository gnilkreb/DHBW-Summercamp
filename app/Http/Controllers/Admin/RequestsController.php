<?php

namespace App\Http\Controllers\Admin;

use App\TaskRequest;

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

}
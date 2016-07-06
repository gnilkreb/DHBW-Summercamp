<?php

namespace App\Http\Controllers\Admin;

use App\TaskRequest;

class RequestsController extends BaseController
{

    public function index()
    {
        return $this->adminView('requests');
    }

    public function requests()
    {
        $requests = TaskRequest::where('done', 0)->orderBy('created_at', 'asc')->get();
        $count = $requests->count();
        $html = view('partials.requests', [
            'requests' => $requests
        ])->render();
        
        return response()->json([
            'data' => [
                'count' => $count,
                'html' => $html
            ] 
        ]);
    }

}
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
        
        return view('partials.requests', [
            'requests' => $requests 
        ]);
    }

}
<?php

namespace App\Http\Controllers;

class AdminBaseController extends Controller
{

    static $pages = [
        'dashboard' => 'Dashboard',
        'users' => 'Benutzer',
        'levels' => 'Levels',
        'teams' => 'Teams',
        'statistics' => 'Statistik'
    ];

    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => [
            'login',
            'authenticate',
        ]]);
    }

    protected function adminView($page, $customData = [])
    {
        $data = ['pages' => AdminController::$pages] + $customData;

        return view('admin.' . $page, $data);
    }
    
}
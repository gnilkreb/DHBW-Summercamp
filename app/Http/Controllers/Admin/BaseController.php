<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    private $pages = [
        'dashboard' => ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard'],
        'users' => ['label' => 'Benutzer', 'icon' => 'fa fa-user'],
        'levels' => ['label' => 'Level', 'icon' => 'fa fa-star'],
        'teams' => ['label' => 'Teams', 'icon' => 'fa fa-users'],
        'files' => ['label' => 'Dateien', 'icon' => 'fa fa-files-o'],
        'statistics' => ['label' => 'Statistik', 'icon' => 'fa fa-bar-chart']
    ];

    public function __construct($except = [])
    {
        $this->middleware('auth.admin', [
            'except' => $except
        ]);
    }

    protected function adminView($page, $customData = [])
    {
        $data = ['pages' => $this->pages] + $customData;

        return view('admin.' . $page, $data);
    }
    
}
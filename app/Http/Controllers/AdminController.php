<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminLoginRequest;
use App\User;
use Auth;
use App\Http\Requests;

class AdminController extends Controller
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

    public function login()
    {
        $admins = Admin::all();

        return view('admin.login', ['pages' => [], 'admins' => $admins]);
    }

    public function authenticate(AdminLoginRequest $request)
    {
        $adminId = $request->admin_id;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(['id' => $adminId, 'password' => $password])) {
            return redirect()->intended('admin.dashboard');
        }

        return redirect()->back()->withErrors(['password' => 'Falsches Passwort']);
    }

    public function dashboard()
    {
        return $this->adminView('dashboard');
    }

    public function users()
    {
        $users = User::all();

        return $this->adminView('users', ['users' => $users]);
    }

    public function levels()
    {
        return $this->adminView('levels');
    }

    public function teams()
    {
        return $this->adminView('teams');
    }

    public function statistics()
    {
        return $this->adminView('statistics');
    }

    private function adminView($page, $customData = [])
    {
        
        $data = ['pages' => AdminController::$pages] + $customData;

        return view('admin.' . $page, $data);
    }

}

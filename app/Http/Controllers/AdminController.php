<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\CreateLevelRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Level;
use App\Team;
use App\User;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

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

    public function user($id = null)
    {
        $user = new User();
        $new = true;

        if ($id !== null) {
            $user = User::findOrFail($id);
            $new = false;
        }

        return $this->adminView('user', ['user' => $user, 'new' => $new]);
    }

    public function saveUser(UserRegisterRequest $request)
    {
        $user = User::firstOrNew(['id' => $request->get('id')]);

        $user->fill($request->all());
        $user->save();

        return $this->users();
    }

    public function levels()
    {
        $categories = Category::all();
        $levels = Level::all();

        return $this->adminView('levels', ['categories' => $categories, 'levels' => $levels]);
    }

    public function level($id = null)
    {
        $level = new Level();
        $new = true;
        $categories = Category::all();

        if($id !== null) {
            $level = Level::findOrFail($id);
            $new = false;
        }

        return $this->adminView('level', ['level' => $level, 'new' => $new, 'categories' => $categories]);
    }

    public function saveLevel(CreateLevelRequest $request)
    {
        $level = Level::firstOrNew(['id' => $request->get('id')]);

        $level->fill($request->all());
        $level->save();

        return $this->levels();
    }

    public function teams()
    {
        return $this->adminView('teams', ['teams' => Team::all()]);
    }

    public function createTeam() {
        return $this->adminView('team.create');
    }

    public function storeTeam(Request $request) {
        $team = new Team();
        $team->name = $request->name;
        $team->save();

        return $this->adminView('teams', ['teams' => Team::all()]);
    }

    public function editTeam($id) {
        return $this->adminView('team.edit', ['team' => Team::findOrFail($id)]);
    }

    public function updateTeam(Request $request, $id) {
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->save();

        return $this->adminView('teams', ['teams' => Team::all()]);
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

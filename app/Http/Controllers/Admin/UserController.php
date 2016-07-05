<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegisterRequest;
use App\Team;
use App\User;

class UserController extends BaseController
{

    public function index()
    {
        $users = User::all()->sortBy('role');

        return $this->adminView('users', [
            'users' => $users
        ]);
    }

    public function show($id = null)
    {
        $user = new User();
        $new = true;
        $teams = Team::all();

        if ($id !== null) {
            $user = User::findOrFail($id);
            $new = false;
        }

        return $this->adminView('user', [
            'user' => $user,
            'new' => $new,
            'teams' => $teams
        ]);
    }

    public function save(RegisterRequest $request)
    {
        $user = User::firstOrNew(['id' => $request->get('id')]);

        $data = $request->all();

        if ($data['team_id'] === '') {
            $data['team_id'] = null;
        }

        if ($data['password'] !== '') {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->fill($data);
        $user->save();

        return redirect('/admin/users');
    }

    public function delete($id)
    {
        User::destroy($id);

        return response()->json(true);
    }

}
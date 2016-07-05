<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends BaseController
{

    public function index()
    {
        return $this->adminView('teams', [
            'teams' => Team::all()
        ]);
    }

    public function createTeam()
    {
        return $this->adminView('team.create');
    }

    public function storeTeam(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->save();

        return $this->adminView('teams', ['teams' => Team::all()]);
    }

    public function editTeam($id)
    {
        return $this->adminView('team.edit', ['team' => Team::findOrFail($id)]);
    }

    public function updateTeam(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->save();

        return $this->adminView('teams', ['teams' => Team::all()]);
    }

    public function deleteTeam($id)
    {
        Team::destroy($id);

        return response()->json(true);
    }

}
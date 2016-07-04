<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Level;

class LevelController extends Controller
{
    public function show($id) {
        $level = Level::findOrFail($id);
        $tasks = $level->tasks;

        return view('tasks', ['tasks' => $tasks]);
    }

}

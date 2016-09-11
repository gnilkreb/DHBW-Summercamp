<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Level;

class LevelController extends BaseController
{

    public function show($id)
    {
        $level = Level::findOrFail($id);
        $tasks = $level->tasks->sortBy('difficulty');
        $category = $level->category;

        Activity::log($category, $level);

        return view('level', [
            'level' => $level,
            'tasks' => $tasks,
            'category' => $category
        ]);
    }

}

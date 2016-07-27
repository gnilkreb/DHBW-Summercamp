<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Level;

class LevelController extends BaseController
{

    public function show($id)
    {
        $level = Level::findOrFail($id);
        $tasks = $level->tasks;
        $category = Category::findOrFail($level->id);

        return view('level', [
            'level' => $level,
            'tasks' => $tasks,
            'category' => $category
        ]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CreateLevelRequest;
use App\Level;

class LevelController extends BaseController
{

    public function index()
    {
        $categories = Category::all();
        $levels = Level::all()->sortBy('order');

        return $this->adminView('levels', [
            'categories' => $categories,
            'levels' => $levels
        ]);
    }

    public function show($id = null)
    {
        $level = new Level();
        $new = true;
        $categories = Category::all();

        if ($id !== null) {
            $level = Level::findOrFail($id);
            $new = false;
        }

        $tasks = $level->tasks->sortBy('difficulty');

        return $this->adminView('level', [
            'level' => $level,
            'new' => $new,
            'categories' => $categories,
            'tasks' => $tasks
        ]);
    }

    public function save(CreateLevelRequest $request)
    {
        $level = Level::firstOrNew(['id' => $request->get('id')]);

        $level->fill($request->all());
        $level->save();

        return redirect('/admin/levels');
    }

    public function delete($id)
    {
        Level::destroy($id);

        return response()->json(true);
    }

}
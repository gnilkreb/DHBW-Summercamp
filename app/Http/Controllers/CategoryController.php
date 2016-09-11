<?php

namespace App\Http\Controllers;

use App\Category;
use App\Option;

class CategoryController extends BaseController
{

    public function index()
    {
        $categories = Category::all();

        return view('categories', [
            'categories' => $categories
        ]);
    }

    public function levels($id)
    {
        $category = Category::findOrFail($id);
        $levels = $category->levels->sortBy('order');

        if (Option::linearProgression()) {
            $this->lockLevels($levels);
        }

        return view('levels', [
            'levels' => $levels,
            'category' => $category
        ]);
    }

    private function lockLevels($levels)
    {
        $locked = false;

        foreach ($levels as $level) {
            $level->locked = $locked;

            if (!$locked && $level->stars() === 0) {
                $locked = true;
            }
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Category;

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

        return view('levels', [
            'levels' => $levels,
            'category' => $category
        ]);
    }

}

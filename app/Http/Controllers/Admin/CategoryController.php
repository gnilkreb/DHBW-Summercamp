<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\SaveCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{

    public function index() {
        $categories = Category::all();

        return view('categories', ['categories' => $categories]);
    }

    public function levels($id) {
        $category = Category::findOrFail($id);

        $levels = $category->levels;

        return view('levels', ['levels' => $levels]);
    }

    public function difficulties($id) {
        return view('difficulty');
    }

    public function setCategoryActive(Request $request)
    {
        $id = $request->route('id');
        $category = Category::findOrFail($id);
        $category->active = ($request->get('active') === 'true' ? true : false);

        $category->save();

        return response()->json(true);
    }

    public function show($id = null)
    {
        $category = new Category();
        $new = true;

        if($id !== null) {
            $category = Category::findOrFail($id);
            $new = false;
        }

        $levels = $category->levels->sortBy('order');

        return $this->adminView('category', ['category' => $category, 'new' => $new, 'levels' => $levels]);
    }

    public function save(SaveCategoryRequest $request)
    {
        $category = Category::firstOrNew(['id' => $request->get('id')]);

        $category->fill($request->all());
        $category->save();

        return redirect('/admin/levels');
    }

    public function delete($id)
    {
        Category::destroy($id);

        return response()->json(true);
    }

}

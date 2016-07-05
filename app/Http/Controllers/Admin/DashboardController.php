<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    public function index()
    {
        $options = Option::all();

        return $this->adminView('dashboard', [
            'options' => $options
        ]);
    }

    public function option($id, Request $request)
    {
        $option = Option::findOrFail($id);
        $value = $request->get('value');
        $option->value = $value;

        $option->save();

        return response()->json(true);
    }

}
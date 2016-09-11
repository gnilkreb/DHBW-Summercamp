<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    public function index()
    {
        $users = User::where('role', 'user')->get();
        $options = Option::all();

        return $this->adminView('dashboard', [
            'users' => $users,
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
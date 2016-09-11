<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    public static function userOverviewPayload()
    {
        $users = DashboardController::usersWithActivity();

        $html = view('partials.user-overview', [
            'users' => $users
        ])->render();

        return $html;
    }

    private static function usersWithActivity()
    {
        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            $user->activity = $user->latestActivity();
        }

        return $users;
    }

    public function index()
    {
        $users = DashboardController::usersWithActivity();
        $options = Option::all();

        return $this->adminView('dashboard', [
            'users' => $users,
            'options' => $options
        ]);
    }

    public function partial()
    {
        $html = DashboardController::userOverviewPayload();

        return response()->json([
            'data' => $html
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
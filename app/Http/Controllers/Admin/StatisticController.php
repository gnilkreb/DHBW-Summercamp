<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\User;

class StatisticController extends BaseController
{

    public function index()
    {
        return $this->adminView('statistics', ['users' => $users = User::where('role', 'user')->get(), 'tasks' => Task::all()]);
    }

}
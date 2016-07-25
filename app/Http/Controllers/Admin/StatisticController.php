<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\User;

class StatisticController extends BaseController
{

    public function index()
    {
        return $this->adminView('statistics', ['users' => $users = User::all(), 'tasks' => Task::all()]);
    }

}
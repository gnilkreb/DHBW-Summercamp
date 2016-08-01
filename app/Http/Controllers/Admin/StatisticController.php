<?php

namespace App\Http\Controllers\Admin;

use App\FinishedTask;
use App\User;

class StatisticController extends BaseController
{

    public function index()
    {
        $users = User::where('role', 'user')->get();
        $finishedTasks = FinishedTask::with('task')->get();

        return $this->adminView('statistics', [
            'users' => $users,
            'finishedTasks' => $finishedTasks
        ]);
    }

}
<?php

namespace App\Http\Controllers\Admin;

class StatisticController extends BaseController
{

    public function index()
    {
        return $this->adminView('statistics');
    }

}
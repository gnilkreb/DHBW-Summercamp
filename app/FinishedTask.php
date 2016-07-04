<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishedTask extends Model
{

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function task()
    {
        return $this->hasOne('App\Task');
    }

}

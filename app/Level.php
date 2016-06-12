<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    public function category()
    {
        return $this->hasOne('App/Category');
    }

    public function tasks()
    {
        return $this->hasMany('App/Task');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $fillable = ['title', 'category_id', 'order'];

    public function category()
    {
        return $this->hasOne('App/Category');
    }

    public function tasks()
    {
        return $this->hasMany('App/Task');
    }

}

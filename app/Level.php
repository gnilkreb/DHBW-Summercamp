<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $fillable = [
        'id',
        'title',
        'category_id',
        'order'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'id',
        'name',
        'active'
    ];

    public function levels()
    {
        return $this->hasMany('App\Level');
    }

}

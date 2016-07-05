<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'id',
        'name',
        'image_url',
        'active'
    ];

    public function levels()
    {
        return $this->hasMany('App\Level');
    }

}

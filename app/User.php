<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = ['first_name', 'last_name', 'age', 'gender'];

    public function team()
    {
        return $this->hasOne('App/Team');
    }

}

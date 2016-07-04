<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    public function level()
    {
        return $this->hasOne('App\Level');
    }
    
    public function pdf()
    {
        return $this->hasOne('App\File');
    }
    
}

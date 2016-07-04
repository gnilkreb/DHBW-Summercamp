<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'id',
        'level_id',
        'difficulty',
        'content'
    ];

    public function level()
    {
        return $this->hasOne('App\Level');
    }

    public function pdf()
    {
        return $this->hasOne('App\File');
    }

    public function difficultyName()
    {
        $difficultyNames = [
            1 => 'Einfach',
            2 => 'Mittel',
            3 => 'Schwer'
        ];

        return $difficultyNames[$this->difficulty];
    }

    public function difficultyColor() {
        $difficultyColors = [
            1 => 'green',
            2 => 'brown',
            3 => 'red'
        ];

        return $difficultyColors[$this->difficulty];
    }

}

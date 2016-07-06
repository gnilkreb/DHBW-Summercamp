<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'id',
        'level_id',
        'difficulty',
        'content',
        'youtube_url',
        'pdf_url'
    ];

    public function level()
    {
        return $this->belongsTo('App\Level');
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

    public function difficultyColor()
    {
        $difficultyColors = [
            1 => 'green',
            2 => 'brown',
            3 => 'red'
        ];

        return $difficultyColors[$this->difficulty];
    }

    public function imageUrl()
    {
        $color = $this->difficultyColor();
        $checked = $this->taskChecked();

        return '/img/png/btn_' . $color . ($checked ? '_check' : '') . '.png';
    }

    public function taskChecked()
    {
        //TODO: has to be done :D
        if (rand(1, 10) < 5) {
            return true;
        }
        return false;
    }

}

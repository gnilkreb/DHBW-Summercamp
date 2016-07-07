<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'task_id',
        'label',
        'correct'
    ];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

}

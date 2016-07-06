<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskRequest extends Model
{
    
    protected $fillable = [
        'user_id',
        'task_id',
        'done'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

}

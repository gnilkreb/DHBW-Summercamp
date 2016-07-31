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

    public function stars($user = null)
    {
        $tasks = $this->tasks()->get()->sortByDesc('difficulty');
        $finishedTask = $tasks->first(function ($key, $task) use ($user) {
            return $task->finished($user);
        });

        if ($finishedTask) {
            return $finishedTask->difficulty;
        }

        return 0;
    }

    public function hasTrophy()
    {
        $tasks = $this->tasks()->get();
        $finished = $tasks->reduce(function ($carry, $task) {
            if($task->finished()) {
                return $carry + 1;
            }

            return $carry;
        }, 0);

        return $tasks->count() === $finished && $finished > 0;
    }

    public function imageUrl()
    {
        $isFinished = $this->stars() > 0;

        if ($isFinished) {
            return '/img/png/star.png';
        }

        return '/img/png/star_empty.png';
    }

}

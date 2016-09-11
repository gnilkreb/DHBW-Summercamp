<?php

namespace App;

use App\Domain\Tasks\FinishType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{

    protected $fillable = [
        'id',
        'level_id',
        'difficulty',
        'content',
        'youtube_url',
        'pdf_url',
        'finish_type',
        'question'
    ];

    protected $casts = [
        'finish_type' => 'integer'
    ];

    public function level()
    {
        return $this->belongsTo('App\Level');
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

    public function imageUrl()
    {
        if ($this->finished()) {
            return '/img/png/star.png';
        }

        return '/img/png/star_empty.png';
    }

    public function finished($user = null)
    {
        if ($user === null) {
            $user = Auth::user();
        }

        $result = FinishedTask::where([
            ['user_id', $user->id],
            ['task_id', $this->id]
        ])->get();

        return $result->count() >= 1;
    }

    public function teacherRequested()
    {
        $user = Auth::user();
        $result = TaskRequest::where([
            ['user_id', $user->id],
            ['task_id', $this->id],
            ['done', 0]
        ]);

        return $result->count() >= 1;
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function isMultipleChoice()
    {
        return $this->finish_type === FinishType::MULTIPLE_CHOICE;
    }

    public function finishButtonLabel()
    {
        if ($this->finish_type === FinishType::SELF) {
            return 'Ab zur nächsten Aufgabe!';
        }

        return 'Aufgabe lösen';
    }

}

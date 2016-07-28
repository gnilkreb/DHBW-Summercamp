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
        'finish_type'
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

    public function difficultyColor()
    {
        $difficultyColors = [
            1 => 'bronze',
            2 => 'silver',
            3 => 'gold'
        ];

        return $difficultyColors[$this->difficulty];
    }

    public function imageUrl()
    {
        $color = $this->difficultyColor();
        $finished = $this->finished();

        return '/img/png/btn_' . $color . ($finished ? '_checked' : '') . '.png';
    }

    public function finished()
    {
        $user = Auth::user();
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

}

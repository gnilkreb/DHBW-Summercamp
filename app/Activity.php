<?php

namespace App;

use App\Http\Controllers\Admin\DashboardController;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Pusher;

class Activity extends Model
{

    public static function log($category = null, $level = null, $task = null)
    {
        $pusher = new Pusher(env('PUSHER_KEY'), env('PUSHER_SECRET'), env('PUSHER_APP_ID'), [
            'cluster' => 'eu',
            'encrypted' => true
        ]);

        $user = Auth::user();
        $activity = new Activity();
        $activity->user_id = $user->id;
        $activity->category_id = $category ? $category->id : null;
        $activity->level_id = $level ? $level->id : null;
        $activity->task_id = $task ? $task->id : null;

        $activity->save();
        $pusher->trigger('admin', 'activity', DashboardController::userOverviewPayload());
    }

    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'level_id',
        'task_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

}

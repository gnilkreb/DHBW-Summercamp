<?php

namespace App;

use Carbon\Carbon;
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
        return $this->hasOne('App/Category');
    }

    public function tasks()
    {
        return $this->hasMany('App/Task');
    }

    public function createdAtDiff()
    {
        Carbon::setLocale('de');

        $createdAt = new Carbon($this->created_at);

        return $createdAt->diffForHumans();
    }

    public function updatedAtDiff()
    {
        Carbon::setLocale('de');

        $updatedAt = new Carbon($this->updated_at);

        return $updatedAt->diffForHumans();
    }

}

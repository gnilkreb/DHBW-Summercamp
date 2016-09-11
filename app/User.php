<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{

    static public function schoolsAndGrades()
    {
        return [
            'schools' => [
                'Grundschule',
                'Hauptschule',
                'Realschule',
                'Gymnasium'
            ],
            'grades' => range(1, 13)
        ];
    }

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'age',
        'gender',
        'team_id',
        'login_at',
        'password',
        'role',
        'school',
        'grade',
        'remember_token'
    ];

    public $randomNames = [
        'Kitty',
        'Lakita',
        'Harriette',
        'Nena',
        'Cecilia',
        'Milly',
        'Bobbie',
        'Deandra',
        'Levi',
        'Jami',
        'Kelvin',
        'Kristal',
        'Lourdes',
        'Reita',
        'Alfonso',
        'Johnathan',
        'Drew',
        'Jacquie',
        'Suzanne',
        'Lizeth'
    ];

    protected $dates = ['login_at'];

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function teamName()
    {
        if ($this->team) {
            return $this->team->name;
        }

        return '';
    }

    public function schoolAndGrade()
    {
        if (!$this->school || !$this->grade) {
            return false;
        }

        return $this->school . ' ' . $this->grade . '. Klasse';
    }

    public function genderIcon()
    {
        return $this->gender === 1 ? 'venus' : 'mars';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function getRank()
    {
        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            $user->stars = $user->getStars();
        }

        $ranking = $users->sortByDesc('stars');

        $rank = 1;

        foreach ($ranking as $rankedUser) {
            if ($rankedUser->id === $this->id) {
                return $rank;
            }

            $rank++;
        }

        return $rank;
    }

    public function getStars()
    {
        $levels = Level::all();
        $this->stars = 0;

        foreach ($levels as $level) {
            $this->stars += $level->stars($this);
        }

        return $this->stars;
    }

    public function finishedTasks()
    {
        return $this->hasMany('App\FinishedTask');
    }

    public function progress()
    {
        $finishedTasks = $this->finishedTasks()->count();
        $allTasks = Task::all()->count();
        $progress = round($finishedTasks / $allTasks * 100, 0);

        if ($progress < 0) {
            $progress = 0;
        } else if ($progress > 100) {
            $progress = 100;
        }

        return $progress;
    }

    public function latestActivity()
    {
        return Activity::orderBy('created_at', 'desc')->first();
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getRandomName()
    {
        return $this->randomNames[rand(0, count($this->randomNames) - 1)];
    }

}

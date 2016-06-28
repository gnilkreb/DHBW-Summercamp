<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{

    protected $fillable = ['first_name', 'last_name', 'age', 'gender'];

    public function __construct($exists = true)
    {
        parent::__construct();
        
        $this->exists = $exists;
    }

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function team()
    {
        return $this->hasOne('App/Team');
    }

    public function genderIcon()
    {
        return $this->gender === 1 ? 'venus' : 'mars';
    }

    public function createdAtDiff()
    {
        Carbon::setLocale('de');
        
        $createdAt = new Carbon($this->created_at);

        return $createdAt->diffForHumans();
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
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

    protected $fillable = [
        'id',
        'key',
        'name',
        'type',
        'label'
    ];

    public static function register()
    {
        return Option::isEnabled('register', true);
    }

    public static function linearProgression()
    {
        return Option::isEnabled('linear_progression', false);
    }

    private static function isEnabled($key, $default)
    {
        $isEnabled = $default;
        $option = Option::where('key', $key)->first();

        if ($option) {
            $isEnabled = $option->value === '1';
        }

        return $isEnabled;
    }

}

<?php

namespace App\Helpers;

use Carbon\Carbon;

class CarbonHelper
{

    public static function diffForHumans($date)
    {
        Carbon::setLocale('de');

        $carbon = new Carbon($date);

        return $carbon->diffForHumans();
    }

}
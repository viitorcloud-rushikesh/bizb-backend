<?php

use App\Helpers\Timezone;
use App\Helpers\Time;

if (! function_exists('timezone')) {
    /**
     * Access the timezone helper.
     */
    function timezone()
    {
        return resolve(Timezone::class);
    }
}

if (! function_exists('time')) {
    /**
     * Access the timezone helper.
     */
    function time()
    {
        return resolve(Time::class);
    }
}

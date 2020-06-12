<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
 * Carbon helper
 *
 * @param $time
 * @param $tz
 *
 * @return Carbon\Carbon
 */
class Time
{

    function carbon($time = null, $tz = null)
    {
        return new \Carbon\Carbon($time, $tz);
    }
    function Formatted($time = null, $tz = null)
    {
        return carbon($time, $tz)->format(config('system.time.display_format'));
    }
}

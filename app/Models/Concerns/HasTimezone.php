<?php

namespace App\Models\Concerns;

use Carbon\Carbon;

trait HasTimezone
{
    /**
     * Display timestamps in user's timezone.
     *
     * @param mixed $value
     */
    protected function asDateTime($value)
    {
        if ($value instanceof Carbon) {
            return $value;
        }

        $timezone = auth()->user()->timezone ?? config('app.settings.date_time.timezone') ?? config('app.timezone');
        $timezone = (timezone()->isValidTimezone($timezone)) ? $timezone : config('app.timezone');

        $value = parent::asDateTime($value);

        return $value->timezone($timezone);
    }
}

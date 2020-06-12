<?php

namespace App\Helpers;

use Carbon\Carbon;

class Timezone
{
    /**
     * Helper to grab global timezone list as collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function timezonesCollection()
    {
        return collect(\DateTimeZone::listIdentifiers());
    }

    /**
     * Helper to grab global timezone list with offsets as a collection.
     *
     * @return mixed
     */
    public function timezonesCollectionWithOffsets()
    {
        $utcTime = new \DateTime('now', new \DateTimeZone('UTC'));
        $timezoneList = $this->timezonesCollection()->map(function ($timezoneIdentifier) use ($utcTime) {
            $offset = (int) (new \DateTimeZone($timezoneIdentifier))->getOffset($utcTime);

            return ['offset' => $offset, 'identifier' => $timezoneIdentifier];
        })->sort(function ($a, $b) {
            return ($a['offset'] === $b['offset']) ? strcmp($a['identifier'], $b['identifier']) : $a['offset'] - $b['offset'];
        })->keyBy('identifier')->map(function ($timezoneArray) {
            $sign = ($timezoneArray['offset'] > 0) ? '+' : '-';
            $offset = '(UTC '.$sign.gmdate('H:i', abs($timezoneArray['offset'])).') '.$timezoneArray['identifier'];

            return $offset;
        });

        return $timezoneList;
    }

    /**
     * Helper to generate a select element for timezones.
     *
     * @param string $name
     * @param string $class
     * @param null   $value
     * @param mixed  $attributes
     *
     * @return \Spatie\Html\Elements\Select
     *
     * example: timezonesSelect('timezone','select2','America/Adak')
     */
    public function timezonesSelect($name = 'timezone', $class = '', $value = null, $attributes = [])
    {
        return html()->select($name, $this->timezonesCollectionWithOffsets(), $value)->class($class)->attributes($attributes);
    }

    /**
     * Helper to Check if a string is a valid timezone.
     *
     * timezone_identifiers_list() requires PHP >= 5.2
     *
     * @param string $timezone
     *
     * @return bool
     */
    public function isValidTimezone($timezone)
    {
        return \in_array($timezone, $this->timezonesCollection()->toArray(), true);
    }

    /**
     * @param Carbon $date
     * @param string $format
     *
     * @return Carbon
     */
    public function convertToLocal(Carbon $date, $format): string
    {
        $format = $format ?? auth()->user()->date_format ?? config('app.settings.date_time.date_format');

        return $date->setTimezone(auth()->user()->timezone ?? config('app.timezone'))->format($format);
    }

    /**
     * @param $date
     *
     * @return Carbon
     */
    public function convertFromLocal($date): Carbon
    {
        return Carbon::parse($date, auth()->user()->timezone)->setTimezone(config('app.timezone'));
    }
}

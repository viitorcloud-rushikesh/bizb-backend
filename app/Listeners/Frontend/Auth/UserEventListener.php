<?php

namespace App\Listeners\Frontend\Auth;

use App\Jobs\SendUserConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function onNeedsConfirmation($event)
    {
        $user = $event->user;
        $otp = $event->otp;
        dispatch(new SendUserConfirmation(
            $user,$otp
        ));
        \Log::info('User Confirmation job dispatched for: ' . $user['name']);
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Frontend\Auth\UserConfirmation::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onNeedsConfirmation'
        );
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}

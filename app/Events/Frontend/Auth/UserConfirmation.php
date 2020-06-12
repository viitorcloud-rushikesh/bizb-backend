<?php

namespace App\Events\Frontend\Auth;

use Illuminate\Queue\SerializesModels;

class UserConfirmation
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}

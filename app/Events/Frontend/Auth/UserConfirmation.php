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
    public $otp;

    /**
     * UserConfirmation constructor.
     * @param $user
     * @param $otp
     */
    public function __construct($user,$otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }
}

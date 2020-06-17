<?php

namespace App\Mail\Frontend\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserConfirmEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $otp;

    /**
     * UserConfirmEmail constructor.
     * @param $user
     * @param $otp
     */
    public function __construct($user,$otp)
    {
        $this->user = $user;
        $this->otp = $otp;
        $this->subject = 'OTP-Email Verification';
    }

    /**
     * @return UserConfirmEmail
     */
    public function build()
    {
        return $this->view('frontend.mail.account_registration')
            ->with([
                'user' => $this->user,
                'otp' => $this->otp,
            ]);
    }
}

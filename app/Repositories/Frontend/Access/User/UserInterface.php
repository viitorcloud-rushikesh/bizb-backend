<?php

namespace App\Repositories\Frontend\Access\User;

interface UserInterface
{
    public function emailVerification($email,$verificationCode);
}

<?php

namespace App\Repositories\Frontend\Access\User;

use App\Models\User;
use App\Models\LinkedSocialAccount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserInterface
{
    protected $model;

    public function __construct(User $model, LinkedSocialAccount $linkedSocialAccount)
    {
        $this->model = $model;
        $this->linkedSocialAccount = $linkedSocialAccount;
    }

    /**
     * @param $email
     * @param $verificationCode
     * @return bool
     */
    public function emailVerification($email, $verificationCode)
    {
        try {
            $user = $this->model->where('email', $email)->where('confirmation_code', $verificationCode)->first();

            if ($user) {
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                return true;
            }

            return false;
        } catch (\Exception $ex) {
            Log::error($ex);
            return false;
        }
    }
}

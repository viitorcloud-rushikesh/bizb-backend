<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserInterface as UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * @var UserRepo
     */
    private $userRepo;

    /**
     * @param UserRepo $userRepo
     * @since 2020-06-09
     *
     * UserController constructor.
     *
     * @author Jaynil Parekh
     */
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param $email
     * @param $verificationCode
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @since 2020-06-09
     *
     * Email verification
     *
     * @author Jaynil Parekh
     */
    public function emailVerification($email,$verificationCode)
    {
        try {
            $response = $this->userRepo->emailVerification($email,$verificationCode);

            if ($response) {
                return view('pages.thank-you');
            } else {
                return view('pages.blank');
            }
        } catch (\Exception $ex) {
            Log::error($ex);
            return view('pages.blank');
        }
    }

}

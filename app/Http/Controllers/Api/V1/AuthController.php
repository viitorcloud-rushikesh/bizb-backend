<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Api\Access\User\UserInterface as UserRepo;

class AuthController extends Controller
{
    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * AuthController constructor.
     *
     * @param UserRepo $userRepo
     */
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Login User
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        try{
            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $status                 = 400;
                return response()->json($response,$status);
            }
            $response = $this->userRepo->loginVerification($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex){
            $response['message']    = $ex->getMessage();
            $status                 = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Mpin Login User
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function mPinLogin(Request $request)
    {
        try{
            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'mpin'  => 'required|max:4',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $status                 = 400;
                return response()->json($response,$status);
            }
            $response = $this->userRepo->mPinloginVerification($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex){
            $response['message']    = $ex->getMessage();
            $status                 = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Register User
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $response = [];
        try{
            $validation = Validator::make($request->all(), [
                'name'      => 'required|string',
                'email'     => 'required|email|unique:users',
                'password'  => 'required|min:8|max:15|confirmed|regex:"^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,15}$"',
                'mobile'    => 'required|min:10|unique:users',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $status                 = 400;
                return response()->json($response,$status);
            }
            $response = $this->userRepo->createUser($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex){
            $response['message']    = $ex->getMessage();
            $status                 = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Social Login User
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function socialLogin(Request $request)
    {
        $response = [];
        try {

            $validation = Validator::make($request->all(), [
                'provider'  => 'required',
                'id'        => 'required',
                'email'     => 'required',
                'name'      => 'required',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $status                 = 400;
                return response()->json($response,$status);
            }
            try {
                $response = $this->userRepo->findOrCreateSocial($request->all());
                $status = $response['status'];
                unset($response['status']);
            } catch (\Exception $ex) {
                $response['message']    = $ex->getMessage();
                $status                 = 403;
            }
        } catch (\Exception $ex) {
            $response['message']    = $ex->getMessage();
            $status                 = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-10
     *
     * Forgot Password Otp generate
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function forgotPassword(Request $request){

        $response = [];

        try{
            $validation = Validator::make($request->all(), [
                'email' => 'required',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $status                 = 400;
                return response()->json($response,$status);
            }

            $response = $this->userRepo->sendOtpForForgotPassword($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex) {
            $response['message']    = $ex->getMessage();
            $status                 = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-10
     *
     * Forgot Password Otp generate
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function confirmOtpForForgotPassword(Request $request){

        $response = [];

        try{
            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'otp'   => 'required',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $response['success']    = false;
                $status                 = 400;
                return response()->json($response,$status);
            }

            $response = $this->userRepo->confirmOtpForForgotPassword($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex) {
            $response['message']    = $ex->getMessage();
            $response['success']    = false;
            $status                 = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-10
     *
     * Reset Password
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function resetPassword(Request $request){

        $response = [];

        try{
            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'password'  => 'required|min:8|max:15|confirmed|regex:"^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,15}$"',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $response['success']    = false;
                $status                 = 400;
                return response()->json($response,$status);
            }

            $response = $this->userRepo->resetPassword($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex) {
            $response['message']    = $ex->getMessage();
            $response['success']    = false;
            $status                 = 403;
        }
        return response()->json($response,$status);
    }
}

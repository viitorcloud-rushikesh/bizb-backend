<?php

namespace App\Http\Controllers\Api\V1\Access;

use App\Http\Controllers\Controller;
use App\Repositories\Api\Access\User\UserInterface as UserRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

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
     * @param Request $request
     * @return JsonResponse
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Change password.
     *
     */
    public function getUserDetail()
    {
        $response = [];

        try {
            $response = $this->userRepo->getUserDetail();
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex) {
            Log::error($ex);
            $status = 403;
        }
        return response()->json($response, $status);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Change password.
     *
     */
    public function changePassword(Request $request)
    {
        $response = [];

        try {

            $validation = Validator::make($request->all(), [
                'current_password' => 'required',
                'password' => 'required',
            ]);

            if ($validation->fails()) {
                $response['message'] = $validation->messages()->first();
                $status = 400;
                return response()->json($response, $status);
            }

            $response = $this->userRepo->changePassword($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex) {
            Log::error($ex);
            $status = 403;
        }
        return response()->json($response, $status);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Change password.
     *
     */
    public function setMpin(Request $request)
    {
        $response = [];

        try {

            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'mpin' => 'required|max:4',
            ]);

            if ($validation->fails()) {
                $response['message'] = $validation->messages()->first();
                $status = 400;
                return response()->json($response, $status);
            }

            $response = $this->userRepo->setMpin($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex) {
            Log::error($ex);
            $status = 403;
        }
        return response()->json($response, $status);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Change Four digit pin.
     *
     */
    public function changeMpin(Request $request)
    {
        $response = [];

        try {

            $validation = Validator::make($request->all(), [
                'email' => 'required',
                'old_mpin' => 'required|max:4',
                'mpin' => 'required|max:4',
            ]);

            if ($validation->fails()) {
                $response['message'] = $validation->messages()->first();
                $status = 400;
                return response()->json($response, $status);
            }

            $response = $this->userRepo->changeMpin($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex) {
            Log::error($ex);
            $status = 403;
        }
        return response()->json($response, $status);
    }
}

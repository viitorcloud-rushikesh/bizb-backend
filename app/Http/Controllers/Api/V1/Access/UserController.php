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
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * UserController constructor.
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
     * Change password.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getUserDetail()
    {
        $response = [];

        try{
            $response   = $this->userRepo->getUserDetail();
            $status     = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex){
            Log::error($ex);
            $status = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Change password.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function changePassword(Request $request)
    {
        $response = [];

        try{

            $validation = Validator::make($request->all(), [
                'current_password' => 'required',
                'password' => 'required',
            ]);

            if ($validation->fails()) {
                $response['message']    = $validation->messages()->first();
                $status                 = 400;
                return response()->json($response,$status);
            }

            $response = $this->userRepo->changePassword($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex){
            Log::error($ex);
            $status = 403;
        }
        return response()->json($response,$status);
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Change password.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function setMpin(Request $request)
    {
        $response = [];

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

            $response = $this->userRepo->setMpin($request->all());
            $status = $response['status'];
            unset($response['status']);
        } catch (\Exception $ex){
            Log::error($ex);
            $status = 403;
        }
        return response()->json($response,$status);
    }
}

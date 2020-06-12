<?php

namespace App\Repositories\Api\Access\User;

use App\Jobs\SendForgotPasswordOtp;
use App\Models\User;
use App\Models\LinkedSocialAccount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserInterface
{

    /**
     * @author Jaynil Parekh
     * @since 2020-06-08
     * @var User
     */
    protected $model;

    /**
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * UserRepository constructor.
     *
     * @param User $model
     * @param LinkedSocialAccount $linkedSocialAccount
     */
    public function __construct(User $model,LinkedSocialAccount $linkedSocialAccount)
    {
        $this->model = $model;
        $this->linkedSocialAccount = $linkedSocialAccount;
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Find user by email.
     * @param $email
     *
     * @return bool
     */
    public function findByEmail($email)
    {
        return $this->model->query()->where('email', $email)->first();
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Find user by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->query()->where('id', $id)->first();
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Login verification and create token.
     *
     * @param array $data
     * @return bool
     */
    public function loginVerification(array $data){
        $response = [];

        try{

            $user = $this->findByEmail($data['email']);

            if(!empty($user) && Hash::check($data['password'], $user->password)){

                if(!empty($user->email_verified_at)){

                    $token = $user->createToken('app-token');

                    $userData['id']     = $user->id;
                    $userData['name']   = $user->name;
                    $userData['email']  = $user->email;
                    $userData['mobile'] = $user->mobile;

                    $response['token']     = $token->plainTextToken;
                    $response['user']      = $userData;
                    $response['status']    = 200;

                } else{
                    $response['message']   = 'You email is not verified!';
                    $response['status']    = 401;
                }
            } else{
                $response['message']   = 'Your email or password might be wrong!';
                $response['status']    = 401;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $response['message'] = 'Something went wrong!';
            $response['status'] = 401;
        }
        return $response;
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Mpin Login verification and create token.
     *
     * @param array $data
     * @return array
     */
    public function mPinloginVerification(array $data){
        $response = [];

        try{

            $user = $this->findByEmail($data['email']);

            if(!empty($user)){

                $mPin = getUserMetaValue($user->id,'mpin');

                if(!empty($mPin) && Hash::check($data['mpin'], $mPin)){

                    $token = $user->createToken('app-token');

                    $userData['id']     = $user->id;
                    $userData['name']   = $user->name;
                    $userData['email']  = $user->email;
                    $userData['mobile'] = $user->mobile;

                    $response['token']     = $token->plainTextToken;
                    $response['user']      = $userData;
                    $response['status']    = 200;

                } else{
                    $response['message']   = 'Mpin is not valid';
                    $response['status']    = 401;
                }
            } else{
                $response['message']   = 'Mpin is not valid';
                $response['status']    = 401;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $response['message'] = 'Something went wrong!';
            $response['status'] = 401;
        }
        return $response;
    }

    /**
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Store user and send verification email.
     *
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data){
        try{
            $userData['email']  = $data['email'] ?? null;
            $userData['name']   = $data['name'] ?? null;
            $userData['mobile'] = $data['mobile'] ?? null;
            $userData['password'] = bcrypt($data['password']) ?? null;
            $userData['confirmation_code'] = generateConfirmationCode();

            if($user = $this->model->create($userData)){
                $user->assignRole('user');

                $dataRegister['user_id']    = $user->id;
                $dataRegister['meta_key']   = 'registered_from';
                $dataRegister['meta_value'] = 'Mobile';

                $dataRegisterOs['user_id']      = $user->id;
                $dataRegisterOs['meta_key']     = 'registered_os';
                $dataRegisterOs['meta_value']   = 'Android';

                $dataRegisterWith['user_id']    = $user->id;
                $dataRegisterWith['meta_key']   = 'registered_with';
                $dataRegisterWith['meta_value'] = 'Normal';

                //Adding details to user meta
                addUserMultipleMetaValue([$dataRegister,$dataRegisterOs,$dataRegisterWith]);

                //event for sending mail of email verification
                event(new \App\Events\Frontend\Auth\UserConfirmation($user));

                //Creating token for authentication
                $token = $user->createToken('app-token');

                $userDetail['id']     = $user->id;
                $userDetail['name']   = $user->name;
                $userDetail['email']  = $user->email;
                $userDetail['mobile'] = $user->mobile;

                $responseData['token']      = $token->plainTextToken;
                $responseData['user']       = $userDetail;
                $responseData['message']    = 'Registered successfully!';
                $responseData['status']     = 200;
            } else{
                $responseData['message']    = 'Something went wrong!';
                $responseData['status']     = 403;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $responseData['message']    = 'Something went wrong!';
            $responseData['status']     = 403;
        }

        return $responseData;
    }

    /**
     *
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Social media login and adding user.
     *
     * @param array $data
     * @param $provider
     * @return bool
     */
    public function findOrCreateSocial(array $data){

        $responseData = [];

        try{

            if(env('SOCIAL_MEDIA_AUTH')) { //if social media login allows

                $provider = $data['provider'];

                // User email may not provided.
                $user_email = $data['email'] ?: "{$data['id']}@{$provider}.com";

                // Check to see if there is a user with this email first.
                $account = $this->linkedSocialAccount->where('provider_name', $provider)
                    ->where('provider_id', $data['id'])
                    ->first();

                if ($account) {
                    $user = $account->user;

                    $token = $user->createToken('app-token');

                    $userData['id'] = $user->id;
                    $userData['name'] = $user->name;
                    $userData['email'] = $user->email;
                    $userData['mobile'] = $user->mobile;
                } else {
                    $user = $this->findByEmail($data['email']);

                    //Checking email is registered or not if not then save it
                    if (!$user) {
                        $user = $this->model->create([
                            'email' => $user_email,
                            'name' => $data['name'],
                            'email_verified_at' => date('Y-m-d H:i:s'),
                        ])->assignRole('user');

                        $dataRegister['user_id'] = $user->id;
                        $dataRegister['meta_key'] = 'registered_from';
                        $dataRegister['meta_value'] = 'Social media';

                        $dataRegisterOs['user_id'] = $user->id;
                        $dataRegisterOs['meta_key'] = 'registered_os';
                        $dataRegisterOs['meta_value'] = 'Android';

                        $dataRegisterWith['user_id'] = $user->id;
                        $dataRegisterWith['meta_key'] = 'registered_with';
                        $dataRegisterWith['meta_value'] = $provider;

                        //Adding details to user meta
                        addUserMultipleMetaValue([$dataRegister, $dataRegisterOs, $dataRegisterWith]);
                    }

                    //Store social media account id and provider
                    $user->accounts()->create([
                        'provider_id' => $data['id'],
                        'provider_name' => $provider,
                    ]);

                    //deleting previous generated tokens
                    if (!empty($user)) {
                        $user->tokens()->delete();
                    }

                    //Generating new token
                    $token = $user->createToken('app-token');

                    $userData['id']     = $user->id;
                    $userData['name']   = $user->name;
                    $userData['email']  = $user->email;
                    $userData['mobile'] = $user->mobile;
                }

                $responseData['token']      = $token->plainTextToken;
                $responseData['user']       = $userData;
                $responseData['message']    = 'Login from '.$provider.' sucessfully!';
                $responseData['status']     = 200;

            } else{
                $responseData['message']    = 'Social media login is not allowed!';
                $responseData['status']     = 403;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $responseData['message']    = 'Something went wrong!';
            $responseData['status']     = 403;
        }
        return $responseData;
    }

    /**
     *
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Get User details.
     *
     * @return array
     */
    public function getUserDetail()
    {
        $response = [];

        try{
            $user = loggedInUser();

            //Logged in user details array
            if($user){
                $data['id']     = $user->id;
                $data['name']   = $user->name;
                $data['email']  = $user->email;
                $data['mobile'] = $user->mobile;

                $response['user']   = $data;
                $response['status'] = 200;
            }else{
                $response['user']   = [];
                $response['status'] = 401;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $response['message']    = 'Something went wrong!';
            $response['status']     = 403;
        }

        return $response;
    }

    /**
     *
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Change password.
     *
     * @param array $data
     * @return array
     */
    public function changePassword(array $data)
    {
        $response = [];

        try {

            $user = loggedInUser();

            $currentPassword = isset($data['current_password']) ? $data['current_password'] : '';

            //Checking current password if password is not valid will return error message else if reset with new password
            if (isset($currentPassword) && $currentPassword != '' && !Hash::check($data['current_password'], $user->password)) {
                $response['status']     = 401;
                $response['message']    = 'Current password does not matched!';
            } elseif (isset($data['password'])) {
                $user->password = bcrypt($data['password']);

                if ($user->save()) {
                    $response['status']     = 200;
                    $response['message']    = 'Password updated successfully';
                }
            } else {
                $response['status']     = 403;
                $response['message']    = 'Something went wrong!';
            }
        } catch (\Exception $ex) {
            Log::error($ex);
            $response['status']     = 403;
            $response['message']    = 'Something went wrong!';
        }
        return $response;
    }

    /**
     *
     * @author Jaynil Parekh
     * @since 2020-06-08
     *
     * Set four digit password.
     *
     * @param array $data
     * @return array
     */
    public function setMpin(array $data){
        $response = [];

        try{
            $user = $this->findByEmail($data['email']);

            //Check user available or not
            if($user){

                //Save mpin
                addUserSingleMetaValue($user->id,'mpin',bcrypt($data['mpin']));

                $response['status']     = 200;
                $response['message']    = 'Mpin generated successfully!';
            }else{
                $response['status']     = 400;
                $response['message']    = 'Something went wrong!';
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $response['status']     = 403;
            $response['message']    = 'Something went wrong!';
        }

        return $response;
    }

    /**
     *
     * @author Jaynil Parekh
     * @since 2020-06-10
     *
     * Send OTP for Forgot password.
     *
     * @param array $data
     * @return array
     */
    public function sendOtpForForgotPassword(array $data){

        $response = [];

        try{
            $user = $this->findByEmail($data['email']);

            //Check user available or not
            if($user){

                $oldOtp = getUserMetaValue($user->id,'forgot_password_otp');

                $otp = generateOtp();

                //Send otp to user's email
                dispatch(new SendForgotPasswordOtp($user,$otp));

                //Check if otp is available in our data or not
                if($oldOtp){

                    //Update old OTP
                    updateUserMetaValue($user->id,'forgot_password_otp',bcrypt($otp));
                } else{

                    //Add OTP
                    addUserSingleMetaValue($user->id,'forgot_password_otp',bcrypt($otp));
                }
                $response['status']     = 200;
                $response['message']    = 'OTP Sent successfully to your mail!';
                $response['success']    = true;
            }else{
                $response['status']     = 400;
                $response['message']    = 'Something went wrong!';
                $response['success']    = false;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $response['status']     = 403;
            $response['message']    = 'Something went wrong!';
            $response['success']    = false;
        }

        return $response;
    }

    /**
     *
     * @author Jaynil Parekh
     * @since 2020-06-10
     *
     * Check OTP For Forgot Password.
     *
     * @param array $data
     * @return array
     */
    public function confirmOtpForForgotPassword(array $data){
        $response = [];

        try{
            $user = $this->findByEmail($data['email']);

            $originalOtp = getUserMetaValue($user->id,'forgot_password_otp');

            if($user && !empty($originalOtp) && Hash::check($data['otp'],$originalOtp)){

                removeUserMetaValue($user->id,'forgot_password_otp');

                $response['status']     = 200;
                $response['message']    = 'OTP verification successful!';
                $response['success']    = true;
            } else{
                $response['status']     = 401;
                $response['message']    = 'Invalid OTP!';
                $response['success']    = false;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $response['status']     = 403;
            $response['message']    = 'Something went wrong!';
            $response['success']    = false;
        }
        return $response;
    }

    /**
     *
     * @author Jaynil Parekh
     * @since 2020-06-10
     *
     * Reset Password.
     *
     * @param array $data
     * @return array
     */
    public function resetPassword(array $data){
        $response = [];

        try{
            $user = $this->findByEmail($data['email']);

            if($user){

                $user->password = bcrypt($data['password']);

                if($user->save()){
                    $response['status']     = 200;
                    $response['message']    = 'Password reset successfully!';
                    $response['success']    = true;
                } else{
                    $response['status']     = 200;
                    $response['message']    = 'Reset Password Failed!';
                    $response['success']    = false;
                }
            } else{
                $response['status']     = 401;
                $response['message']    = 'Reset Password Failed!';
                $response['success']    = false;
            }
        } catch (\Exception $ex){
            Log::error($ex);
            $response['status']     = 403;
            $response['message']    = 'Something went wrong!';
            $response['success']    = false;
        }
        return $response;
    }
}

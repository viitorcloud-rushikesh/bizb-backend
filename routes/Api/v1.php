<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::post('login','AuthController@login');
    Route::post('mpin-login','AuthController@mPinLogin');
    Route::post('register','AuthController@register');
    Route::post('social-login','AuthController@socialLogin');
    Route::post('forgot-password','AuthController@forgotPassword');
    Route::post('forgot-password/check-otp','AuthController@confirmOtpForForgotPassword');
    Route::post('reset-password','AuthController@resetPassword');

    Route::group(['middleware' => 'auth:sanctum'],function (){

        Route::group(['namespace' => 'Access', 'prefix' => 'user'], function (){
            Route::get('detail','UserController@getUserDetail');
            Route::post('set-mpin','UserController@setMpin');
            Route::post('change-password','UserController@changePassword');
        });
    });
});


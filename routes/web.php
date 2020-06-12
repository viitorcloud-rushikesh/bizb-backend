<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function ()
{
    Route::view('/', 'landing')->name('landing');
    Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Frontend\Auth'], function () {
    Route::get('login/{provider}', 'SocialAccountController@redirectToProvider')->name('social-media.login');
    Route::get('login/{provider}/callback', 'SocialAccountController@handleProviderCallback');

    Route::get('email-verification/{email}/{verification_code}', 'UserController@emailVerification')->name('email-verification');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permitted', 'verified', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function ()
{
    Route::middleware(['auth'])->name('admin.')->group(function () {

        Route::get('/', function (){
            return redirect(route('admin.dashboard'));
        });
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
        Route::view('/pages/slick', 'pages.slick')->name('pages.slick');
        Route::view('/pages/datatables', 'pages.datatables')->name('pages.datatables');
        Route::view('/pages/blank', 'pages.blank')->name('pages.blank');
        Route::view('/pages/elements', 'pages.elements')->name('pages.elements');

        // Test only permitted to superadmin and on local environment now
        Route::any('/test/{function?}', 'TestController@index')->name('test')->middleware('local');
        Route::impersonate();

        // Route::resource('users', 'UserController');
        // Route::get('/users', 'UserController@index')->name('users')->middleware('auth');

        Route::get('/pages/settings', 'SettingController@index')->name('pages.settings');
        Route::get('/pages/authentication-enable', 'SettingController@authenticationEnable')->name('pages.authentication-enable');
        Route::post('/save-two-way-authentication-details', 'SettingController@saveTwoWayAuthenticationDetails')->name('pages.save-two-way-authentication-details');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permitted', 'verified', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function ()
{
    Route::middleware([])->name('admin.')->group(function () {
        Route::resource('users', 'UserController');
        // Route::get('/users', 'UserController@index')->name('users')->middleware('auth');
    });
});

Route::get('/apm', '\Done\LaravelAPM\ApmController@index')->name('apm')->middleware(['auth', 'permitted', 'verified']);

});

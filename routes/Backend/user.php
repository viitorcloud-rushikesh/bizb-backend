<?php
/*----------------------------- DASHBOARD ROUTES STARTS -----------------------------*/
Route::get('/', function (){
    return redirect(route('dashboard'));
});

Route::group(['namespace' => 'Dashboard'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
});

/*----------------------------- DASHBOARD ROUTES ENDS -----------------------------*/

/*----------------------------- USER ROUTES STARTS-----------------------------*/
Route::group(['namespace' => 'User'], function () {
    Route::resource('users', 'UserController');
});
/*----------------------------- USER ROUTES ENDS-----------------------------*/

Route::view('/pages/slick', 'pages.slick')->name('pages.slick');
Route::view('/pages/datatables', 'pages.datatables')->name('pages.datatables');
Route::view('/pages/blank', 'pages.blank')->name('pages.blank');
Route::view('/pages/elements', 'pages.elements')->name('pages.elements');

// Test only permitted to superadmin and on local environment now
Route::any('/test/{function?}', 'TestController@index')->name('test')->middleware('local');
Route::impersonate();


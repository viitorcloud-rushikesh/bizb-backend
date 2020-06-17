<?php

/*----------------------------- SETTINGS ROUTES STARTS-----------------------------*/
Route::group(['namespace' => 'Setting'], function () {
    Route::get('/pages/settings', 'SettingController@index')->name('pages.settings');
    Route::get('/pages/authentication-enable', 'SettingController@authenticationEnable')->name('pages.authentication-enable');
    Route::post('/save-two-way-authentication-details', 'SettingController@saveTwoWayAuthenticationDetails')->name('pages.save-two-way-authentication-details');
});
/*----------------------------- SETTINGS ROUTES ENDS-----------------------------*/

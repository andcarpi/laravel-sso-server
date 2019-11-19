<?php

/**
 * Routes which is neccessary for the SSO server.
 */

Route::middleware(['api', \Illuminate\Session\Middleware\StartSession::class])->prefix('api/sso')->group(function () {
    Route::post('login', 'andcarpi\LaravelSSOServer\Controllers\ServerController@login');
    Route::post('logout', 'andcarpi\LaravelSSOServer\Controllers\ServerController@logout');
    Route::get('attach', 'andcarpi\LaravelSSOServer\Controllers\ServerController@attach');
    Route::get('userInfo', 'andcarpi\LaravelSSOServer\Controllers\ServerController@userInfo');
});

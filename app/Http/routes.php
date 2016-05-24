<?php

Route::get('/', 'LoginHandlerController@handle');

Route::group(['middleware' => 'auth'], function () {
    /**
     * ADMIN
     */
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::any('/', function () {
            return "Login As Admin";
        });
    });

    /**
     * STUDENT
     */
    Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {
        Route::any('/', function () {
            return "Login As Student";
        });
    });

    /**
     * TEACHER
     */
    Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {
        Route::any('/', function () {
            return view('DashboardGuru');
        });
    });

    Route::get('/DashboardSiswa', function () {
        return view('DashboardSiswa');
    });


});

Route::get('/', function () {
    return view('login');
});

Route::get('/test', function () {
    return view('DashboardSiswa');
});

/**
 * Custom Route Auth Instead of using Route::auth()
 */
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('password/change', function () {
    return view('changePassword');
});

/*
// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
*/


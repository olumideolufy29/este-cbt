<?php

Route::get('/', 'LoginHandlerController@handle');

Route::group(['middleware' => 'auth'], function () {
    /**
     * ADMIN
     */
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/','AdminController@index');
    });

    /**
     * STUDENT
     */
    Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {
        Route::get('/','StudentController@index');
        Route::get('/ujian/{id}','StudentController@ujian');
    });

    /**
     * TEACHER
     */
    Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {
        Route::get('/','TeacherController@index');
        Route::get('result/{id}','TeacherController@result')
    });

});

Route::get('/', function () {
    return view('login');
});

/**
 * Custom Route Auth Instead of using Route::auth()
 */
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('password/change','LoginHandlerController@changePass');

/*
// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
*/


<?php

Route::get('/', 'LoginHandlerController@handle');


Route::group(['middleware' => 'auth'], function () {

    Route::controller('first-login', 'Auth\FirstLoginController');

    Route::controller('change-password', 'Auth\ChangePasswordController');

    Route::get('credits', function(){
        return view('credit');
    });

});

/**
 * ADMIN
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::any('/', function () {
        return view('admin.index');
    });
    Route::resource('teacher-management', 'Admin\TeacherController');
    Route::resource('student-management', 'Admin\StudentController');
    Route::resource('subject-management', 'Admin\SubjectController');
    Route::resource('class-management', 'Admin\KelasController');
    Route::resource('test-management', 'Make\TestController');
});


/**
 * TEACHER
 */
Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {
    // Route::get('/','TeacherController@index');
    // Route::post('submitexam','TeacherController@storeExam');
    // Route::get('submitexam/{id}','TeacherController@makeExam');
    // Route::post('submitexam/{id}','TeacherController@storeExamItem');

    // Route::get('result/{id}','TeacherController@result');
    Route::any('/', function () {
        return view('teacher.index');
    });
});

/**
 * STUDENT
 */
Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {
//    Route::get('/ujian/{id}','StudentController@ujian');
    Route::post('/ujian','StudentController@masuk');
    Route::post('/selesai','StudentController@submit');
    Route::any('/', 'StudentController@index');
});

/**
 * TEACHER & ADMIN 
 */
Route::group(['middleware' => 'adminguru'], function () {
    Route::resource('test-management', 'Make\TestController');
    Route::resource('question-management', 'Make\QuestionsController');
});


Route::get('/test', function () {
    return view('ujian');

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

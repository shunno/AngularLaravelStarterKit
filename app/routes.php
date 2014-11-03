<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all the admin routes.
|
*/

Route::group(array('prefix' => 'admin'), function () {

    // # Post Management
    // Route::group(array('prefix' => 'posts'), function () {
    //     Route::get('/', array('as' => 'posts', 'uses' => 'Controllers\Admin\PostsController@getIndex'));
    //     Route::get('create', array('as' => 'create/post', 'uses' => 'Controllers\Admin\PostsController@getCreate'));
    //     Route::post('create', 'Controllers\Admin\PostsController@postCreate');
    //     Route::get('{blogId}/edit', array('as' => 'update/post', 'uses' => 'Controllers\Admin\PostsController@getEdit'));
    //     Route::post('{blogId}/edit', 'Controllers\Admin\PostsController@postEdit');
    //     Route::get('{blogId}/delete', array('as' => 'delete/post', 'uses' => 'Controllers\Admin\PostsController@getDelete'));
    //     Route::get('{blogId}/confirm-delete', array('as' => 'confirm-delete/post', 'uses' => 'Controllers\Admin\PostsController@getModalDelete'));
    //     Route::get('{blogId}/restore', array('as' => 'restore/post', 'uses' => 'Controllers\Admin\PostsController@getRestore'));
    // });

    # Students Management
    Route::group(array('prefix' => 'students'), function () {
        Route::get('/', array('as' => 'students', 'uses' => 'Controllers\Admin\StudentsController@getIndex'));
        Route::get('getstudents', array('as' => 'getstudents', 'uses' => 'Controllers\Admin\StudentsController@getStudents'));
        Route::post('create', array('as' => 'create', 'uses' => 'Controllers\Admin\StudentsController@SaveStudent'));
        Route::get('delete', array('as' => 'delete', 'uses' => 'Controllers\Admin\StudentsController@DeleteStudent'));

    });


    # Courses Management
    Route::group(array('prefix' => 'courses'), function () {
        Route::get('/', array('as' => 'courses', 'uses' => 'Controllers\Admin\CoursesController@getIndex'));
        Route::get('getcourses', array('as' => 'getcourses', 'uses' => 'Controllers\Admin\CoursesController@getCourses'));
        Route::post('create', array('as' => 'create', 'uses' => 'Controllers\Admin\CoursesController@SaveCourse'));
        Route::get('delete', array('as' => 'delete', 'uses' => 'Controllers\Admin\CoursesController@DeleteCourse'));

    });


    # StudentCourse Management
    Route::group(array('prefix' => 'studentcourse'), function () {
        Route::get('/', array('as' => 'studentcourse', 'uses' => 'Controllers\Admin\StudentCourseController@getIndex'));
        Route::get('getstudentcourse', array('as' => 'getstudentcourse', 'uses' => 'Controllers\Admin\StudentCourseController@GetStudentCourse'));
        Route::post('create', array('as' => 'create', 'uses' => 'Controllers\Admin\StudentCourseController@SaveStudentCourse'));

    });

    # User Management
    Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'Controllers\Admin\UsersController@getIndex'));
        Route::get('create', array('as' => 'create/user', 'uses' => 'Controllers\Admin\UsersController@getCreate'));
        Route::post('create', 'Controllers\Admin\UsersController@postCreate');
        Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'Controllers\Admin\UsersController@getEdit'));
        Route::post('{userId}/edit', 'Controllers\Admin\UsersController@postEdit');
        Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'Controllers\Admin\UsersController@getDelete'));
        Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'Controllers\Admin\UsersController@getModalDelete'));
        Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'Controllers\Admin\UsersController@getRestore'));
        Route::get('{userId}/unsuspend', array('as' => 'unsuspend/user', 'uses' => 'Controllers\Admin\UsersController@getUnsuspend'));
    });

    # Group Management
    Route::group(array('prefix' => 'groups'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'Controllers\Admin\GroupsController@getIndex'));
        Route::get('create', array('as' => 'create/group', 'uses' => 'Controllers\Admin\GroupsController@getCreate'));
        Route::post('create', 'Controllers\Admin\GroupsController@postCreate');
        Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'Controllers\Admin\GroupsController@getEdit'));
        Route::post('{groupId}/edit', 'Controllers\Admin\GroupsController@postEdit');
        Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'Controllers\Admin\GroupsController@getDelete'));
        Route::get('{groupId}/confirm-delete', array('as' => 'confirm-delete/group', 'uses' => 'Controllers\Admin\GroupsController@getModalDelete'));
        Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'Controllers\Admin\GroupsController@getRestore'));
    });

    # Dashboard
    Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));

});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'auth'), function () {

    # Login
    Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
    Route::post('signin', 'AuthController@postSignin');

    # Register
    Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
    Route::post('signup', 'AuthController@postSignup');

    # Account Activation
    Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

    # Forgot Password
    Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
    Route::post('forgot-password', 'AuthController@postForgotPassword');

    # Forgot Password Confirmation
    Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
    Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

    # Logout
    Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'account'), function () {

    # Account Dashboard
    Route::get('/', array('as' => 'account', 'uses' => 'Controllers\Account\DashboardController@getIndex'));

    # Profile
    Route::get('profile', array('as' => 'profile', 'uses' => 'Controllers\Account\ProfileController@getIndex'));
    Route::post('profile', 'Controllers\Account\ProfileController@postIndex');

    # Change Password
    Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
    Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

    # Change Email
    Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
    Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('about-us', function () {
    //
    return View::make('frontend/about-us');
});

Route::get('contact-us', array('as' => 'contact-us', 'uses' => 'ContactUsController@getIndex'));
Route::post('contact-us', 'ContactUsController@postIndex');

// Route::get('blog/{postSlug}', array('as' => 'view-post', 'uses' => 'PostController@getView'));
// Route::post('blog/{postSlug}', 'PostController@postView');

// Route::get('/', array('as' => 'home', 'uses' => 'PostController@getIndex'));
Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));
// Route::get('home', array('as' => 'home', 'uses' => 'PostController@getIndex'));



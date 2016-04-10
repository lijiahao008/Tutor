<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {

        Route::get('/user_profile', 'PagesController@getProfile');

		Route::get('/contact', 'PagesController@getContact');

	    Route::get('/about', 'PagesController@getAbout');

	    Route::get('/', 'PagesController@getIndex');
        
        Route::auth();

        Route::get('/userimage/{filename}', [
            'uses' => 'StudentController@getStudentPhoto',
            'as' => 'student.photo'
        ]);

        Route::resource('students', 'StudentController');

        Route::get('/after_registration', 'PagesController@getAfter_registration');

});

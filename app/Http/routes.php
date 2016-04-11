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


		Route::get('/contact', 'PagesController@getContact');

	    Route::get('/about', 'PagesController@getAbout');

	    Route::get('/', 'PagesController@getIndex');
        
        Route::auth();

        Route::get('/studentimage/{filename}', [
            'uses' => 'StudentController@getStudentPhoto',
            'as' => 'student.photo'
        ]);

        Route::get('/tutorimage/{filename}', [
            'uses' => 'TutorController@getTutorPhoto',
            'as' => 'tutor.photo'
        ]);

        Route::get('/search_student', [
            'uses' => 'SearchController@getStudentsResults',
            'as' => 'search.student_results'
        ]);

        Route::get('/search_tutor', [
            'uses' => 'SearchController@getTutorsResults',
            'as' => 'search.tutor_results'
        ]);

        Route::resource('students', 'StudentController');


        Route::resource('tutors', 'TutorController');

        Route::get('/after_registration', 'PagesController@getAfter_registration');

});

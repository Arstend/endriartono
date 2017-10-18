<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Admin'], function() {
	Route::get('/', 'AdminController@index')->name('home');
	Route::get('/new-student', 'NewStudentController@list')->name('new-student');
	Route::group(['prefix' => 'new-student'], function() {
		Route::get('edit/{id}', 'NewStudentController@getEdit');
		Route::post('edit/save.dat', 'NewStudentController@postEdit');
	});
	Route::get('/users', 'UserController@list')->name('user-list');
	Route::group(['prefix' => 'users'], function() {
		Route::get('{id}', 'UserController@getEdit');
		Route::post('{id}', 'UserController@postEdit');
	});
});

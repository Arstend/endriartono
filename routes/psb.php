<?php

/*
|--------------------------------------------------------------------------
| PSB Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PSBController@index')->name('psb.home');
Route::group(['prefix' => 'register'], function(){
	Route::get('smk', 'PSBController@getRegisterSMK')->name('psb.register.smk');
	Route::post('smk', 'PSBController@postRegisterSMK')->name('psb.register.submit');
});

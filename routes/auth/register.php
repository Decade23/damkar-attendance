<?php
/**
 * Users Register Route
 */
Route::group(['prefix' => '/register'], function () {

	Route::get('', 'RegisterController@showRegistrationForm')->name('register.form');

	// For Action
	Route::group(['prefix' => '/action'], function () {
		Route::post('/process', ['uses' => 'LoginController@login'])->name('register.process');
	});

});

/**
 * Change Password
 */
Route::group([
	'middleware' => [
		'language',
		'sentinel.permission:dashboard'
	]
], function () {
	Route::group(['prefix' => '/change-password'], function () {

		Route::post('', ['uses' => 'LoginController@update']);
	});
});
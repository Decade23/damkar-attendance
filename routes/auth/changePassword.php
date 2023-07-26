<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     changePassword.php
 * @LastModified 2/11/19 8:33 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

Route::group( [
	'middleware' => [
		'sentinel.permission:dashboard',
	]
], function () {
    Route::group( [ 'prefix' => 'password' ], function () {

        Route::get( 'change', [ 'uses' => 'ChangePasswordController@edit' ] )->name('auth.change.password.form');

        Route::post( 'change', [ 'uses' => 'ChangePasswordController@update' ] )->name('auth.change.password.action');

    } );
} );
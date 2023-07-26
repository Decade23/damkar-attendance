<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     resetPassword.php
 * @LastModified 2/22/19 9:02 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

Route::group( [ 'prefix' => 'password' ], function () {

    Route::get( 'reset/{userId}/{code}', [ 'uses' => 'ResetPasswordController@showResetForm' ] )->name('auth.reset.password.form');

    Route::post( 'reset/{userId}/{code}', [ 'uses' => 'ResetPasswordController@reset' ] )->name('auth.reset.password');

} );
<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     forgotPassword.php
 * @LastModified 2/21/19 1:34 PM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

Route::group( [ 'prefix' => 'password' ], function () {

    Route::get( 'forgot', [ 'uses' => 'ForgotPasswordController@index' ] )->name('auth.forgot.password.form');

    Route::post( 'send-reset-link', [ 'uses' => 'ForgotPasswordController@sendResetLinkResponse' ] )->name('auth.forgot.password.send.reset.link');

} );
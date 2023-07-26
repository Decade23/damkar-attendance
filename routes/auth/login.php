<?php
/**
 * Users Login Route
 */
Route::group( [ 'prefix' => '/login' ], function () {
	
	Route::get( '', 'LoginController@showLoginForm' )
	     ->name( 'login.form' );
	
	// For Action
	Route::post( '/process', [ 'uses' => 'LoginController@login' ] )
	     ->name( 'login.process' )
	     ->middleware( 'prevent.back.history' );
} );


/**
 * Logout Route
 */
Route::group( [ 'prefix' => '/logout' ], function () {
	
	Route::get( '', 'LoginController@logout' )
	     ->name( 'logout' )
	     ->middleware( 'prevent.back.history' );
} );
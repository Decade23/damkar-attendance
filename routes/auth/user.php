<?php

/**
 * Users Route
 */

//Route::resource( 'users', 'UserController' )
//     ->middleware( [ 'sentinel.permission:users' ] );

Route::group( [
	'middleware' => [
		'language',
		'prevent.back.history'
	],
	'prefix'     => 'users'
], function () {
	//Resource Route
	Route::get( '', 'UserController@index' )
	     ->name( 'users.index' )
	     ->middleware( 'sentinel.permission:user.show' );
	
	Route::get( '/create', 'UserController@create' )
	     ->name( 'users.create' )
	     ->middleware( 'sentinel.permission:user.create' );
	
	Route::post( '', 'UserController@store' )
	     ->name( 'users.store' )
	     ->middleware( 'sentinel.permission:user.create' );
	
	Route::get( '/{user}', 'UserController@show' )
	     ->name( 'users.show' )
	     ->middleware( 'sentinel.permission:user.show' );
	
	Route::get( '/{user}/edit', 'UserController@edit' )
	     ->name( 'users.edit' )
	     ->middleware( 'sentinel.permission:user.edit' );
	
	Route::put( '/{user}', 'UserController@update' )
	     ->name( 'users.update' )
	     ->middleware( 'sentinel.permission:user.edit' );
	
	Route::delete( '/{user}', 'UserController@destroy' )
	     ->name( 'users.destroy' )
	     ->middleware( 'sentinel.permission:user.destroy' );
	
	// For Datatables
	Route::get( '/ajax/data', 'UserController@anyData' )
	     ->name( 'users.ajax.data' )
	     ->middleware( 'sentinel.permission:user.show' );
	
	// For Change User Status
	Route::put( 'users/status/{id}', 'UserController@status' )
	     ->middleware( 'sentinel.permission:user.status' )
	     ->name( 'users.status' )
	     ->where( 'id', '[0-9]+' );

    // For User Select2
    Route::get( '/ajax/select2', 'UserController@select2' )
        ->name( 'users.ajax.select2' )
        ->middleware( 'sentinel.permission:product.show' );
	
} );
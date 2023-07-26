<?php

/**
 * Users Role Route
 */

Route::group( [
	'middleware' => [
		'language',
		'prevent.back.history'
	],
	'prefix'     => 'roles'
], function () {
	//Resource Route
	Route::get( '', 'RoleController@index' )
	     ->name( 'roles.index' )
	     ->middleware( 'sentinel.permission:role.show' );
	
	Route::get( '/create', 'RoleController@create' )
	     ->name( 'roles.create' )
	     ->middleware( 'sentinel.permission:role.create' );
	
	Route::post( '', 'RoleController@store' )
	     ->name( 'roles.store' )
	     ->middleware( 'sentinel.permission:role.create' );
	
	Route::get( '/{role}', 'RoleController@show' )
	     ->name( 'roles.show' )
	     ->middleware( 'sentinel.permission:role.show' );
	
	Route::get( '/{role}/edit', 'RoleController@edit' )
	     ->name( 'roles.edit' )
	     ->middleware( 'sentinel.permission:role.edit' );
	
	Route::put( '/{role}', 'RoleController@update' )
	     ->name( 'roles.update' )
	     ->middleware( 'sentinel.permission:role.edit' );
	
	Route::delete( '/{role}', 'RoleController@destroy' )
	     ->name( 'roles.destroy' )
	     ->middleware( 'sentinel.permission:role.destroy' );
	
	// For Datatables
	Route::get( '/ajax/data', 'RoleController@anyData' )
	     ->name( 'roles.ajax.data' )
	     ->middleware( 'sentinel.permission:role.index' );
} );
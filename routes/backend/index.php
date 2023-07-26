<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => ''], function () {

	#To Find Another Routes Files
	$dir   = base_path( 'routes/backend' );

	#Scan File To Dir
	$files = scandir( $dir );

	foreach ( $files as $file ) {
		if ( ! in_array( $file, array( '.', '..', 'index.php' ) ) ) {
			require $dir . '/' . $file;
		}
	};
});



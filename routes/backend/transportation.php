<?php
/**
 * Created By Dedi Fardiyanto
 *
 *
 *  * Copyright (c) 2020. Created By Dedi Fardiyanto.
 *
 */

Route::group([
    'middleware' => [
        'prevent.back.history'
    ],
    'prefix'     => 'transportation'
], function () {

    //Resource Route
    Route::get('', 'PalembangKito\AdvertisementController@index')
        ->name('transportation.index')->middleware('sentinel.permission:transportation.show');

    Route::get('/create', 'PalembangKito\AdvertisementController@create')
        ->name('transportation.create')->middleware('sentinel.permission:transportation.show');

    Route::post('/store', 'PalembangKito\AdvertisementController@store')
        ->name('transportation.store')->middleware('sentinel.permission:transportation.create');

    Route::get('/{id}/show', 'PalembangKito\AdvertisementController@show')
        ->name('transportation.show')->middleware('sentinel.permission:transportation.show');

    Route::get('/{id}/edit', 'PalembangKito\AdvertisementController@edit')
        ->name('transportation.edit')->middleware('sentinel.permission:transportation.edit');

    Route::put('/{id}/edit/update', 'PalembangKito\AdvertisementController@update')
        ->name('transportation.update')->middleware('sentinel.permission:transportation.edit');


    Route::delete('/{id}/destroy', 'PalembangKito\AdvertisementController@destroy')
        ->name('transportation.destroy')->middleware('sentinel.permission:transportation.destroy');

    Route::delete('/destroy/bulk', 'PalembangKito\AdvertisementController@destroyBulk')
        ->name('transportation.destroy.bulk')->middleware('sentinel.permission:transportation.destroy');

    // For Datatables
    Route::get('/ajax/data', 'PalembangKito\AdvertisementController@datatable')
        ->name('transportation.ajax.data')->middleware('sentinel.permission:transportation.show');

    // For Upload Image
    Route::get('/upload/image', 'PalembangKito\AdvertisementController@uploadImage')
        ->name('transportation.upload.image')->middleware('sentinel.permission:transportation.create');

    // For Destroy Image
    Route::get('/destroy/image', 'PalembangKito\AdvertisementController@uploadImage')
        ->name('transportation.image.destroy')->middleware('sentinel.permission:advertisemen.destroy');

});



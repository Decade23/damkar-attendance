<?php
/**
 * Created By Dedi Fardiyanto
 *
 * @Filename     advertise.php
 * @LastModified 7/2/18 11:47 PM.
 *
 * Copyright (c) 2020. All rights reserved.
 */

Route::group([
    'middleware' => [
        'prevent.back.history'
    ],
    'prefix'     => 'picket'
], function () {

    Route::group([
        'prefix'     => 'lists'
    ], function () {
        //Resource Route
        Route::get('', 'Damkar\PicketController@index')
            ->name('picket.index')->middleware('sentinel.permission:picket.show');

        Route::get('/create', 'Damkar\PicketController@create')
            ->name('picket.create')->middleware('sentinel.permission:picket.show');

        Route::post('/store', 'Damkar\PicketController@store')
            ->name('picket.store')->middleware('sentinel.permission:picket.create');

        Route::get('/{id}/show', 'Damkar\PicketController@show')
            ->name('picket.show')->middleware('sentinel.permission:picket.show');

        Route::put('/{id}/edit', 'Damkar\PicketController@edit')
            ->name('picket.edit')->middleware('sentinel.permission:picket.edit');

        Route::delete('/{id}/destroy', 'Damkar\PicketController@destroy')
            ->name('picket.destroy')->middleware('sentinel.permission:picket.destroy');

        Route::delete('/destroy/bulk', 'Damkar\PicketController@destroyBulk')
            ->name('picket.destroy.bulk')->middleware('sentinel.permission:picket.destroy');

        // For Datatables
        Route::get('/ajax/data', 'Damkar\PicketController@datatable')
            ->name('picket.ajax.data')->middleware('sentinel.permission:picket.show');

        // For Upload Image
        Route::get('/upload/image', 'Damkar\PicketController@uploadImage')
            ->name('picket.upload.image')->middleware('sentinel.permission:picket.create');

        // For Destroy Image
        Route::get('/destroy/image', 'Damkar\PicketController@uploadImage')
            ->name('picket.image.destroy')->middleware('sentinel.permission:picket.destroy');

    });

});

<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename info.php
 * @LastModified 09/05/2020, 15:22
 */

Route::group(/**
 *
 */ [
    'middleware' => [
        'prevent.back.history'
    ],
    'prefix'     => 'info',
    'namespace' => 'PalembangKito'
], function () {
        //Resource Route
        Route::get('', 'InfoController@index')
            ->name('info.index')->middleware('sentinel.permission:info.show');

        Route::get('/create', 'InfoController@create')
            ->name('info.create')->middleware('sentinel.permission:info.create');

        Route::post('/store', 'InfoController@store')
            ->name('info.store')->middleware('sentinel.permission:info.create');

        Route::get('/{id}/edit', 'InfoController@edit')
            ->name('info.edit')->middleware('sentinel.permission:info.edit');

        Route::put('/{id}/edit/update', 'InfoController@update')
            ->name('info.update')->middleware('sentinel.permission:info.edit');


        Route::delete('/{id}/destroy', 'InfoController@destroy')
            ->name('info.destroy')->middleware('sentinel.permission:info.destroy');

        Route::delete('/destroy/bulk', 'InfoController@destroyBulk')
            ->name('info.destroy.bulk')->middleware('sentinel.permission:info.destroy');

        // For Datatables
        Route::get('/ajax/data', 'InfoController@datatable')
            ->name('info.ajax.data')->middleware('sentinel.permission:info.show');

        // For Select2
        Route::get('/ajax/select2', 'InfoController@select2')
            ->name('info.ajax.select2')->middleware('sentinel.permission:info.show');
});

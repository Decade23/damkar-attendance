<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename categories.php
 * @LastModified 28/03/2020, 13:54
 */

Route::group(/**
 *
 */ [
    'middleware' => [
        'prevent.back.history'
    ],
    'prefix'     => 'categories'
], function () {

    Route::group([
        'prefix' => 'sub/parent'
    ], function () {
        //Resource Route
        Route::get('', 'PalembangKito\Categories\CategorySubController@index')
            ->name('category_sub.index')->middleware('sentinel.permission:category_sub.show');

        Route::get('/create', 'PalembangKito\Categories\CategorySubController@create')
            ->name('category_sub.create')->middleware('sentinel.permission:category_sub.create');

        Route::post('/store', 'PalembangKito\Categories\CategorySubController@store')
            ->name('category_sub.store')->middleware('sentinel.permission:category_sub.create');

        Route::get('/{id}/edit', 'PalembangKito\Categories\CategorySubController@edit')
            ->name('category_sub.edit')->middleware('sentinel.permission:category_sub.edit');

        Route::put('/{id}/edit/update', 'PalembangKito\Categories\CategorySubController@update')
            ->name('category_sub.update')->middleware('sentinel.permission:category_sub.edit');


        Route::delete('/{id}/destroy', 'PalembangKito\Categories\CategorySubController@destroy')
            ->name('category_sub.destroy')->middleware('sentinel.permission:category_sub.destroy');

        Route::delete('/destroy/bulk', 'PalembangKito\Categories\CategorySubController@destroyBulk')
            ->name('category_sub.destroy.bulk')->middleware('sentinel.permission:category_sub.destroy');

        // For Datatables
        Route::get('/ajax/data', 'PalembangKito\Categories\CategorySubController@datatable')
            ->name('category_sub.ajax.data')->middleware('sentinel.permission:category_sub.show');

        // For Select2
        Route::get('/ajax/select2', 'PalembangKito\Categories\CategorySubController@select2')
            ->name('category_sub.ajax.select2')->middleware('sentinel.permission:category_sub_detail.show'); //category_sub

        Route::post('/ajax/get', 'PalembangKito\Categories\CategorySubController@ajax')
            ->name('category_sub.ajax.ajax')->middleware('sentinel.permission:category_sub_detail.show'); //category_sub


        // For Upload Image
        Route::get('/upload/image', 'PalembangKito\Categories\CategorySubController@uploadImage')
            ->name('category_sub.upload.image')->middleware('sentinel.permission:category_sub.create');

        // For Destroy Image
        Route::get('/destroy/image', 'PalembangKito\Categories\CategorySubController@uploadImage')
            ->name('category_sub.image.destroy')->middleware('sentinel.permission:advertisemen.destroy');
    });


    Route::group([
        'prefix'     => 'sub/child/detail'
    ], function () {
        //Resource Route
        Route::get('', 'PalembangKito\Categories\CategorySubDetailController@index')
            ->name('category_sub_detail.index')->middleware('sentinel.permission:category_sub_detail.show');

        Route::get('/create', 'PalembangKito\Categories\CategorySubDetailController@create')
            ->name('category_sub_detail.create')->middleware('sentinel.permission:category_sub_detail.create');

        Route::post('/store', 'PalembangKito\Categories\CategorySubDetailController@store')
            ->name('category_sub_detail.store')->middleware('sentinel.permission:category_sub_detail.create');

        Route::get('/{id}/show', 'PalembangKito\Categories\CategorySubDetailController@show')
            ->name('category_sub_detail.show')->middleware('sentinel.permission:category_sub_detail.edit');

        Route::get('/{id}/edit', 'PalembangKito\Categories\CategorySubDetailController@edit')
            ->name('category_sub_detail.edit')->middleware('sentinel.permission:category_sub_detail.edit');

        Route::put('/{id}/update', 'PalembangKito\Categories\CategorySubDetailController@update')
            ->name('category_sub_detail.update')->middleware('sentinel.permission:category_sub_detail.edit');

        Route::delete('/{id}/destroy', 'PalembangKito\Categories\CategorySubDetailController@destroy')
            ->name('category_sub_detail.destroy')->middleware('sentinel.permission:category_sub_detail.destroy');

        Route::delete('/destroy/bulk', 'PalembangKito\Categories\CategorySubDetailController@destroyBulk')
            ->name('category_sub_detail.destroy.bulk')->middleware('sentinel.permission:category_sub_detail.destroy');

        // For Datatables
        Route::get('/ajax/data', 'PalembangKito\Categories\CategorySubDetailController@datatable')
            ->name('category_sub_detail.ajax.data')->middleware('sentinel.permission:category_sub_detail.show');

        // For Select2
        Route::get('/ajax/select2', 'PalembangKito\Categories\CategorySubDetailController@select2')
            ->name('category_sub_detail.ajax.select2')->middleware('sentinel.permission:category_sub_detail.show');

        // For Upload Image
        Route::get('/upload/image', 'PalembangKito\Categories\CategorySubDetailController@uploadImage')
            ->name('category_sub_detail.upload.image')->middleware('sentinel.permission:category_sub_detail.create');

        // For Destroy Image
        Route::get('/destroy/image', 'PalembangKito\Categories\CategorySubDetailController@uploadImage')
            ->name('category_sub_detail.image.destroy')->middleware('sentinel.permission:category_sub_detail.destroy');

    });

});

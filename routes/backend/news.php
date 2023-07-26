<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename news.php
 * @LastModified 16/04/2020, 23:12
 */

Route::group([
    'middleware' => [
        'prevent.back.history'
    ],
    'prefix'     => 'news'
], function () {
    Route::get('', 'PalembangKito\News\NewsController@index')
        ->name('news.index')->middleware('sentinel.permission:news.show');

    Route::get('/create', 'PalembangKito\News\NewsController@create')
        ->name('news.create')->middleware('sentinel.permission:news.create');

    Route::post('/store', 'PalembangKito\News\NewsController@store')
        ->name('news.store')->middleware('sentinel.permission:news.create');

    Route::get('/{id}/show', 'PalembangKito\News\NewsController@show')
        ->name('news.show')->middleware('sentinel.permission:news.edit');

    Route::get('/{id}/edit', 'PalembangKito\News\NewsController@edit')
        ->name('news.edit')->middleware('sentinel.permission:news.edit');

    Route::put('/{id}/edit/update', 'PalembangKito\News\NewsController@update')
        ->name('news.update')->middleware('sentinel.permission:news.edit');


    Route::delete('/{id}/destroy', 'PalembangKito\News\NewsController@destroy')
        ->name('news.destroy')->middleware('sentinel.permission:news.destroy');

    Route::delete('/destroy/bulk', 'PalembangKito\News\NewsController@destroyBulk')
        ->name('news.destroy.bulk')->middleware('sentinel.permission:news.destroy');

    // For Datatables
    Route::get('/ajax/data', 'PalembangKito\News\NewsController@datatable')
        ->name('news.ajax.data')->middleware('sentinel.permission:news.show');

    // For Upload Image
    Route::get('/upload/image', 'PalembangKito\News\NewsController@uploadImage')
        ->name('news.upload.image')->middleware('sentinel.permission:news.create');

    // For Destroy Image
    Route::get('/destroy/image', 'PalembangKito\News\NewsController@uploadImage')
        ->name('news.image.destroy')->middleware('sentinel.permission:advertisemen.destroy');
});


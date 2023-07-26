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
    'prefix'     => 'advertisement'
], function () {

        Route::group([
            'prefix' => 'publish'
        ], function () {
            //Resource Route
            Route::get('', 'PalembangKito\AdvertisementController@index')
                ->name('advertisement.index')->middleware('sentinel.permission:advertisement.show');

            Route::get('/create', 'PalembangKito\AdvertisementController@create')
                ->name('advertisement.create')->middleware('sentinel.permission:advertisement.create');

            Route::post('/store', 'PalembangKito\AdvertisementController@store')
                ->name('advertisement.store')->middleware('sentinel.permission:advertisement.create');

            Route::get('/{id}/show', 'PalembangKito\AdvertisementController@show')
                ->name('advertisement.show')->middleware('sentinel.permission:advertisement.edit');

            Route::get('/{id}/edit', 'PalembangKito\AdvertisementController@edit')
                ->name('advertisement.edit')->middleware('sentinel.permission:advertisement.edit');

            Route::put('/{id}/edit/update', 'PalembangKito\AdvertisementController@update')
                ->name('advertisement.update')->middleware('sentinel.permission:advertisement.edit');


            Route::delete('/{id}/destroy', 'PalembangKito\AdvertisementController@destroy')
                ->name('advertisement.destroy')->middleware('sentinel.permission:advertisement.destroy');

            Route::delete('/destroy/bulk', 'PalembangKito\AdvertisementController@destroyBulk')
                ->name('advertisement.destroy.bulk')->middleware('sentinel.permission:advertisement.destroy');

            // For Datatables
            Route::get('/ajax/data', 'PalembangKito\AdvertisementController@datatable')
                ->name('advertisement.ajax.data')->middleware('sentinel.permission:advertisement.show');

            // For Upload Image
            Route::get('/upload/image', 'PalembangKito\AdvertisementController@uploadImage')
                ->name('advertisement.upload.image')->middleware('sentinel.permission:advertisement.create');

            // For Destroy Image
            Route::get('/destroy/image', 'PalembangKito\AdvertisementController@uploadImage')
                ->name('advertisement.image.destroy')->middleware('sentinel.permission:advertisemen.destroy');
        });


    Route::group([
        'prefix'     => 'customer'
    ], function () {
        //Resource Route
        Route::get('', 'PalembangKito\AdvertisementCustomerController@index')
            ->name('advertisement.customer.index')->middleware('sentinel.permission:advertisement_customer.show');

        Route::get('/create', 'PalembangKito\AdvertisementCustomerController@create')
            ->name('advertisement.customer.create')->middleware('sentinel.permission:advertisement_customer.show');

        Route::post('/store', 'PalembangKito\AdvertisementCustomerController@store')
            ->name('advertisement.customer.store')->middleware('sentinel.permission:advertisement_customer.create');

        Route::get('/{id}/show', 'PalembangKito\AdvertisementCustomerController@show')
            ->name('advertisement.customer.show')->middleware('sentinel.permission:advertisement_customer.show');

        Route::put('/{id}/edit', 'PalembangKito\AdvertisementCustomerController@edit')
            ->name('advertisement.customer.edit')->middleware('sentinel.permission:advertisement_customer.edit');

        Route::delete('/{id}/destroy', 'PalembangKito\AdvertisementCustomerController@destroy')
            ->name('advertisement.customer.destroy')->middleware('sentinel.permission:advertisement_customer.destroy');

        Route::delete('/destroy/bulk', 'PalembangKito\AdvertisementCustomerController@destroyBulk')
            ->name('advertisement.customer.destroy.bulk')->middleware('sentinel.permission:advertisement_customer.destroy');

        // For Datatables
        Route::get('/ajax/data', 'PalembangKito\AdvertisementCustomerController@datatable')
            ->name('advertisement.customer.ajax.data')->middleware('sentinel.permission:advertisement_customer.show');

        // For Upload Image
        Route::get('/upload/image', 'PalembangKito\AdvertisementCustomerController@uploadImage')
            ->name('advertisement.customer.upload.image')->middleware('sentinel.permission:advertisement_customer.create');

        // For Destroy Image
        Route::get('/destroy/image', 'PalembangKito\AdvertisementCustomerController@uploadImage')
            ->name('advertisement.customer.image.destroy')->middleware('sentinel.permission:advertisement_customer.destroy');

    });

});

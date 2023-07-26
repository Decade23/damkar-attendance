<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename reports.php
 * @LastModified 22/04/2020, 23:29
 */

Route::group(/**
 *
 */ [
    'middleware' => [
        'prevent.back.history'
    ],
    'prefix'     => 'reports'
], function () {

    Route::group([
        'prefix' => 'lists'
    ], function () {
        //Resource Route
        Route::get('', 'PalembangKito\Reports\ReportController@index')
            ->name('report.index')->middleware('sentinel.permission:report.show');

        Route::get('/create', 'PalembangKito\Reports\ReportController@create')
            ->name('report.create')->middleware('sentinel.permission:report.create');

        Route::post('/store', 'PalembangKito\Reports\ReportController@store')
            ->name('report.store')->middleware('sentinel.permission:report.create');

        Route::get('/{id}/edit', 'PalembangKito\Reports\ReportController@edit')
            ->name('report.edit')->middleware('sentinel.permission:report.edit');

        Route::put('/{id}/edit/update', 'PalembangKito\Reports\ReportController@update')
            ->name('report.update')->middleware('sentinel.permission:report.edit');


        Route::delete('/{id}/destroy', 'PalembangKito\Reports\ReportController@destroy')
            ->name('report.destroy')->middleware('sentinel.permission:report.destroy');

        Route::delete('/destroy/bulk', 'PalembangKito\Reports\ReportController@destroyBulk')
            ->name('report.destroy.bulk')->middleware('sentinel.permission:report.destroy');

        // For Datatables
        Route::get('/ajax/data', 'PalembangKito\Reports\ReportController@datatable')
            ->name('report.ajax.data')->middleware('sentinel.permission:report.show');

        // For Select2
        Route::get('/ajax/select2', 'PalembangKito\Reports\ReportController@select2')
            ->name('report.ajax.select2')->middleware('sentinel.permission:report.show');

        // For Subcribe FCM
        Route::post('/subscribe/fcm', 'PalembangKito\Reports\ReportController@subscribeFcm')
            ->name('report.subscribe_fcm')->middleware('sentinel.permission:report.create');

    });


    Route::group([
        'prefix'     => 'category'
    ], function () {
        //Resource Route
        Route::get('', 'PalembangKito\Reports\ReportCategoryController@index')
            ->name('report_category.index')->middleware('sentinel.permission:report_category.show');

        Route::get('/create', 'PalembangKito\Reports\ReportCategoryController@create')
            ->name('report_category.create')->middleware('sentinel.permission:report_category.create');

        Route::post('/store', 'PalembangKito\Reports\ReportCategoryController@store')
            ->name('report_category.store')->middleware('sentinel.permission:report_category.create');

        Route::get('/{id}/show', 'PalembangKito\Reports\ReportCategoryController@show')
            ->name('report_category.show')->middleware('sentinel.permission:report_category.edit');

        Route::get('/{id}/edit', 'PalembangKito\Reports\ReportCategoryController@edit')
            ->name('report_category.edit')->middleware('sentinel.permission:report_category.edit');

        Route::put('/{id}/update', 'PalembangKito\Reports\ReportCategoryController@update')
            ->name('report_category.update')->middleware('sentinel.permission:report_category.edit');

        Route::delete('/{id}/destroy', 'PalembangKito\Reports\ReportCategoryController@destroy')
            ->name('report_category.destroy')->middleware('sentinel.permission:report_category.destroy');

        Route::delete('/destroy/bulk', 'PalembangKito\Reports\ReportCategoryController@destroyBulk')
            ->name('report_category.destroy.bulk')->middleware('sentinel.permission:report_category.destroy');

        // For Datatables
        Route::get('/ajax/data', 'PalembangKito\Reports\ReportCategoryController@datatable')
            ->name('report_category.ajax.data')->middleware('sentinel.permission:report_category.show');

        // For Select2
        Route::get('/ajax/select2', 'PalembangKito\Reports\ReportCategoryController@select2')
            ->name('report_category.ajax.select2')->middleware('sentinel.permission:report_category.show');

    });

});

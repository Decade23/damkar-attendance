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
    'prefix'     => 'report'
], function () {

    Route::group([
        'prefix'     => 'picket'
    ], function () {
        //Resource Route
        Route::get('', 'Damkar\ReportController@index')
            ->name('report_damkar.index')->middleware('sentinel.permission:report_damkar.show');

        Route::get('/get-attendance', 'Damkar\ReportController@getAttendance')
            ->name('report_damkar.ajax.data')->middleware('sentinel.permission:report_damkar.show');

        Route::get('/get-attendance-and-aggregate', 'Damkar\ReportController@getAttendanceAndAggregate')
            ->name('report_damkar.ajax.data_attendance_aggregate')->middleware('sentinel.permission:report_damkar.show');
    });

});

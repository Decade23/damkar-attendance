<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     subdistrict.php
 * @LastModified 1/23/19 10:58 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

Route::group([
    'middleware' => [
        'prevent.back.history'
    ],
    'prefix'     => 'subdistrict'
], function () {

    //Select2 Route
//    Route::get('/ajax/select2', 'SubdistrictController@select2')
//        ->name('subdistrict.ajax.select2')->middleware('sentinel.permission:dashboard');
});

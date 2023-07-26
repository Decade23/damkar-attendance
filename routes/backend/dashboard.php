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

Route::group([
    'middleware' => [
        'language',
        'prevent.back.history'
    ],
    'prefix'     => '',
], function () {
    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    Route::post('/getchartdata/daily', 'DashboardController@getchartdaily')
        ->name('dashboard.getchartdata.daily');

    Route::post('/getchartdata/weekly', 'DashboardController@getchartweekly')
        ->name('dashboard.getchartdata.weekly');

    Route::post('/getchartdata/monthly', 'DashboardController@getchartmonthly')
        ->name('dashboard.getchartdata.monthly');
});

<?php
/**
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename tnc.php
 * @LastModified 01/07/2020, 02:18
 */

Route::group([
    'prefix'     => 'tnc'
], function () {
    Route::get('', 'PalembangKito\TncController@tnc')
        ->name('tnc.index');
});

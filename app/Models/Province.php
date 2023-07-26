<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     Province.php
 * @LastModified 12/12/18 9:58 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $primaryKey = 'code';

    protected $fillable = [
        'code', 'province'
    ];

    public $timestamps = false;
}
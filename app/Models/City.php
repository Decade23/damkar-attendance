<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     City.php
 * @LastModified 12/12/18 10:00 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id', 'province_id', 'type', 'city_name', 'postal_code'
    ];

    public $timestamps = false;
}
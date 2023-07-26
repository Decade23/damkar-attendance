<?php
/**
 * Created By Dedi Fardiyanto
 *
 * @Filename     Shortlink.php
 * @LastModified 17/7/19 10:00 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
	protected $table = 'shortlink';

    protected $fillable = [
      'id', 'long_link', 'short_link', 'description', 'counter','created_at', 'updated_at'  
    ];
}
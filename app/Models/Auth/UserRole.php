<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     Commission.php
 * @LastModified 1/30/19 9:01 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Role;
use App\Models\Auth\User;

class UserRole extends Model
{
	protected $table = 'role_users';
    protected $fillable = [
        'role_id'
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
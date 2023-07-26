<?php

namespace App\Models\Auth;

use Cartalyst\Sentinel\Roles\EloquentRole;
use App\Models\Commission;

class Role extends EloquentRole
{

    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'updated_by'
    ];

    /**
     * For Role
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\SentinelModel\Role');
    }
    
    /**
     * For User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\SentinelModel\User');
    }

    public function commission(){
        return $this->hasMany(Commission::class);
    }
}

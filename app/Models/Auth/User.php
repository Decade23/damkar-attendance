<?php

namespace App\Models\Auth;

use App\Models\Orders;
use Cartalyst\Sentinel\Users\EloquentUser;
use App\Models\Product;
use App\Models\Complains;
use App\Models\Groups;
use App\Models\GroupDetails;
use App\Models\Auth\UserProduct;
use Illuminate\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Carbon\Carbon;

class User extends EloquentUser implements AuthenticatableUserContract, AuthenticatableContract // implements JWTSubject // Authenticatable implements JWTSubject
{
    use Authenticatable;
    const last_login = null;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected  $table = 'user';
	protected $fillable = [
		'email',
		'password',
		'name',
		'permissions',
        'phone',
        'type',
        'created_by',
        'email_verified_at',
        'password_confirmed'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

    /**
     * Get user address relations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address(){
        return $this->hasOne(UserAddress::class)->withDefault(function($user) {
            // $userDb = new UserAddress();
            $user->id = 0;
            $user->user_id = 0;
            $user->address = '';
            $user->subdistrict_id = 0;
            $user->province = '';
            $user->postal_code = '';
            $user->created_at = Carbon::now();
            $user->updated_at = Carbon::now();

        });
    }

    public function user_role(){
        return $this->hasOne(UserRole::class, 'user_id', 'id');
    }
}

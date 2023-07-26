<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     ProductService.php
 * @LastModified 2/14/19 4:52 PM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Http\Middleware;

use App\Models\Auth\UserProduct;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;

class ProductService {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
	public function handle( $request, Closure $next ) {

	    #Get User Data
        $user = Sentinel::check();

        #This User Have A Membership Product ?
        $userProduct = UserProduct::with('product')->whereHas('product', function ($query) use ($user) {
            $query->where('type', 'membership');
        })->whereDate('expired_at', '>=', now()->format('Y-m-d'))->where('user_id', $user->id)->count();

        #Check user has access to the product content
        if($userProduct > 0){
            return $next( $request );
        }

        #return abort(404, 'Unauthorized action.');
        return redirect( 'no-access' );
	}
}

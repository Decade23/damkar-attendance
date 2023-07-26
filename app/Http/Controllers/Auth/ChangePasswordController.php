<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     ChangePasswordController.php
 * @LastModified 1/21/19 9:31 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\changePasswordRequest;
use App\Traits\redirectTo;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ChangePasswordController extends Controller
{
    use redirectTo;

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        if(Sentinel::getUser()->user_role->role->slug == 'root' || Sentinel::getUser()->user_role->role->slug == 'sales'){
            return view('auth.passwords.change');
        }
        else{
            return redirect()->route('front.home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param changePasswordRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(changePasswordRequest $request){

        $user = Sentinel::getUser();

        $credentials = [
            'email'    => $user->email,
            'password' => $request->old_password,
        ];

        #Passwird Is Valid For This User
        if(Sentinel::validateCredentials($user, $credentials)) {
            $credentials['password'] = $request->password;

            Sentinel::update($user, $credentials);

            Sentinel::logout();

            return $this->redirectSuccessUpdate(route('login.form'), 'Password');
        } else {

            return $this->redirectFailed(route('auth.change.password.form'), 'Your old password mismatch')->withInput($request->all());

        }

    }
}

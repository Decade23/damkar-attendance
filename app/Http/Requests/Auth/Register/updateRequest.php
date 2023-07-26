<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		
		$rules = [
			'first_name' => 'required|unique:users,first_name,' . request()->route()->user . '|regex:/(^[A-Za-z0-9_-_ ]+$)+/',
			'role'       => 'required',
			'password'   => 'confirmed',
		];
		
		if ( $this->get( 'last_name' ) !== null ) {
			$rules = [
				'last_name' => 'unique:users,last_name,' . request()->route()->user . '|regex:/(^[A-Za-z0-9_-_ ]+$)+/',
			];
		}
		
		if ( $this->get( 'password' ) !== null ) {
			$rules = [ 'password' => 'confirmed|min:8' ];
		}
		
		return $rules;
	}
}

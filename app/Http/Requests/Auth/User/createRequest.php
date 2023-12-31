<?php

namespace App\Http\Requests\Auth\User;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest {


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
		return [
            'name'     => 'required|regex:/(^[A-Za-z0-9_-_ ]+$)+/', //|unique:users
            'phone'    => 'required',
            'email'    => 'required|unique:user|email',
            'role'     => 'required',
            'password' => 'required|confirmed|min:8',
		];
	}

	/**
	 * Get the message
	 *
	 * @return array
	 */
	public function messages() {
		return [
			'country.*.required' => 'The Country field is required.'
		];
	}
}

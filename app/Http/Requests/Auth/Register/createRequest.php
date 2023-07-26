<?php

namespace App\Http\Requests\Auth\Register;

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
		
		if ( request()->type == 'pribadi' ) {
			return [
				'nama'              => 'required|regex:/(^[A-Za-z0-9_-_ ]+$)+/',
				'nik'               => 'required|unique:applicant_data',
				'handphone'         => 'required|unique:applicant_data|min:10',
				'email'             => 'required|unique:applicant_data|email',
				'rincian_informasi' => 'required',
				'tujuan_informasi'  => 'required',
				'terms'             => 'required',
				//'ktp_sim'           => 'required|image|mimes:jpeg,jpg|max:500',
			];
		} else {
			return [
				'nama'                => 'required|regex:/(^[A-Za-z0-9_-_ ]+$)+/',
				'nama_organisasi_lsm' => 'required|regex:/(^[A-Za-z0-9_-_ ]+$)+/',
				'nik'                 => 'required|unique:applicant_data',
				'handphone'           => 'required|unique:applicant_data|min:10',
				'email'               => 'required|unique:applicant_data|email',
				'rincian_informasi'   => 'required',
				'tujuan_informasi'    => 'required',
				'terms'               => 'required',
				//'ktp_sim'           => 'required|image|mimes:jpeg,jpg|max:500',
				//'surat_keterangan'           => 'required|image|mimes:jpeg,jpg|max:500',
			];
		}
		
	}
	
	/**
	 * Get the message
	 *
	 * @return array
	 */
	public function messages() {
		return [//
		];
	}
}

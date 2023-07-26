<?php


namespace App\Http\Requests\Damkar;


use Illuminate\Foundation\Http\FormRequest;

class PicketRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {

        $rules = [
        ];

        if (request()->method('post'))
        {
            return $rules;
        } else {
            $addRules = [
            ];
            return array_merge($rules, $addRules);
        }


    }

}

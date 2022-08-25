<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuthAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|between:2,100',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|string|max:180|unique:users',
            'password' => 'required|string|min:8|max:12',
            'nim' => 'required|string|max:40|min:10|unique:users',
            'programstudi_id' =>'required',
            // 'phone' => 'min:10',
            'tahun_id' => 'required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required',
            'phone'=>'required|numeric',
            'role'=>'required|exists:roles,nam3e',
            'address'=>'required',
            'gender'=>'required',
            'email'=>'required|email|unique:users',
            'image'=>'required|image',

        ];
    }
}

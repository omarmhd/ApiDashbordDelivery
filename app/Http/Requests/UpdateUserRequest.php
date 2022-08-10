<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'password'=>'nullable',

            'phone'=>'required|numeric',
            'role'=>'required|exists:roles,name',
            'address'=>'required',
            'gender'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->user->id.',id',
            'image'=>'sometimes|image',
        ];

    }
}

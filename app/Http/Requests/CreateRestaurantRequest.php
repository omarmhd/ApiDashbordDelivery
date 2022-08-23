<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurantRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'active' => 'required',
            'review' => 'required|numeric',
            'image' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'delivery_time' => 'required',
        ];
    }
}

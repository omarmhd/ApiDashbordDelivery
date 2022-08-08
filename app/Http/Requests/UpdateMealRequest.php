<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMealRequest extends FormRequest
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
            'restaurant_id'=>'required|exists:restaurants,id',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'extras'=>'nullable',
            'bread_name.*'=>'sometimes|required',
            'bread_price.*'=>'sometimes|required|numeric',
            'sweet_name.*'=>'sometimes|required',
            'sweet_price.*'=>'sometimes|required|numeric',
            'image.*'=>'sometimes|required|image'
        ];
    }
}

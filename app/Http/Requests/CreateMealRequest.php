<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMealRequest extends FormRequest
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
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'extras' => 'nullable',
            'exBread' => 'sometimes',
            'exSweet' => 'sometimes',
            'bread_name.*' => 'sometimes|required_if:exBread,yes',
            'bread_price.*' => 'sometimes|required_if:exBread,yes|numeric',
            'sweet_name.*' => 'sometimes|required_if:exSweet,yes',
            'sweet_price.*' => 'sometimes|required_if:exSweet,yes|numeric',
            'image.*' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'restaurant_id.required' => trans('messages.restaurant_id_required'),
            'name.required' => trans('messages.name_required'),
            'bread_name.*.required' => trans('messages.bread_name_required'),
            'bread_price.*.required' => trans('messages.bread_price_required'),
            'sweet_name.*.required' => trans('messages.sweet_name_required'),
            'sweet_price.*.required' => trans('messages.sweet_price_required'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderMealDetailsRequest extends FormRequest
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
            'order_id' => ['nullable'],
            'meal_id' => ['nullable'],
            'number_of_meals' => ['nullable'],
            'extras' => ['nullable'],
            'categories' => ['nullable'],
            'total_price' => ['nullable', 'min:1'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            // 'user_id' => 'required|exists:App\Models\User,id',
            // 'total_price' => 'required|numeric|min:1',
            'status' => ['required', Rule::in(['NOT_GET_YET', 'GET_ORDER', 'IN_WAY', 'IN_LOCATION'])],
            // 'total_arrive_time' => 'date_format:Y-m-d H:i:s',
            'payment_way' => ['required', Rule::in(['VISA', 'MASTER', 'BY_HAND'])],
            // 'delivery_time' => 'date_format:Y-m-d H:i:s',
            // 'time_of_receipt' => 'date_format:Y-m-d H:i:s',
            'meals'=>'required|array',
            'meals.*.extras'=>'nullable|array',
            'meals.*.extras.*.id'=>'required|integer',
            'meals.*.extras.*.count'=>'required|integer',
            // 'notes' => 'string|nullable',
            // 'rate' =>  ['nullable', Rule::in([1, 2, 3, 4, 5])],
            // 'driver_id' => 'exists:App\Models\User,id',
        ];
    }
}

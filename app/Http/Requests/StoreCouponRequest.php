<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'code' => ['required'],
            'ammount' => ['required', 'integer', 'min:1'],
            'uses' => ['nullable'],
            'status' => ['nullable'],
            'start_avilable_at' => ['date'],
            'end_avilable_at' => ['date'],
            'selected_users' => ['required_if:is_selected,1'],
        ];
    }

    public function messages()
    {
        return[
            'selected_users.required_if' => __('messages.selected_users_required_if')
        ];
    }
}

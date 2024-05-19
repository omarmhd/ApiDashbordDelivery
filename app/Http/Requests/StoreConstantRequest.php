<?php

namespace App\Http\Requests;

use App\Models\Constant;
use Illuminate\Foundation\Http\FormRequest;

class StoreConstantRequest extends FormRequest
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
            'key'=>'required|exists:constants,key',
            'value'=>'required|string|max:255',
        ];
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'id' => Constant::where(['key'=>$this->key])->first()->id,
        ]);
    }
}

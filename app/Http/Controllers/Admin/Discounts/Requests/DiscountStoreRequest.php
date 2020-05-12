<?php

namespace App\Http\Controllers\Admin\Discounts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountStoreRequest extends FormRequest
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
            'dname' => 'required|max:150',
            'dcode' => 'required|integer|min:0',
            'dvalue' => 'required|integer|min:0',
            'dtype' => 'required|max:150',
            'dstartdate' => 'required',
            'dexpirydate' => 'required',
            'dbasis' => 'required|min:0|max:1'
        ];
    }
}

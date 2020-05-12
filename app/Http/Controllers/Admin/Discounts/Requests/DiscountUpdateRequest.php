<?php

namespace App\Http\Controllers\Admin\Discounts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountUpdateRequest extends FormRequest
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
            'dname' => 'max:150',
            'dcode' => 'integer|min:0',
            'dvalue' => 'integer|min:0',
            'dtype' => 'max:150',
            'dbasis' => 'min:0|max:1'
        ];
    }
}

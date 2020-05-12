<?php

namespace App\Http\Controllers\Admin\Shipping\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingStoreRequest extends FormRequest
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
            'sptitle' => 'required|max:150',
            'sprate' => 'required|min:0',
            'spstate' => 'required|integer|min:0',
        ];
    }
}

<?php

namespace App\Http\Controllers\Admin\ProductAttributeValues\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAttributeValueStoreRequest extends FormRequest
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
            'pavaid' => 'required|integer',
            'pavvalue' => 'required|integer',
            'pavstatus' => 'required|integer|min:0|max:1',
        ];
    }
}

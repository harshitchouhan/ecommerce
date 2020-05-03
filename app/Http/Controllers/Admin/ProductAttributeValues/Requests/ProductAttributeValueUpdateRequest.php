<?php

namespace App\Http\Controllers\Admin\ProductAttributeValues\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAttributeValueUpdateRequest extends FormRequest
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
            'pavaid' => 'integer',
            'pavvalue' => 'integer',
            'pavstatus' => 'integer|min:0|max:1',
        ];
    }
}

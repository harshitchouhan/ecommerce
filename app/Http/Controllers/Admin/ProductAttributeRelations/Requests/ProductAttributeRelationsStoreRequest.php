<?php

namespace App\Http\Controllers\Admin\ProductAttributeRelations\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAttributeRelationsStoreRequest extends FormRequest
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
            'parpid' => 'required|integer',
            'paraid' => 'required|integer',
        ];
    }
}

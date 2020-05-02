<?php

namespace App\Http\Controllers\Admin\ProductAttribute\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAttributeStoreRequest extends FormRequest
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
            'PAname' => 'required|max:150',
            'PAvalue' => 'required|integer',
            'PAdetail' => 'required|max:1000',
            'PAimage' => 'image|mimes:png,jpg|max:2048'
        ];
    }
}

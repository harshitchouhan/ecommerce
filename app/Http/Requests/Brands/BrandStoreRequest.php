<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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
            'Btitle' => 'required|unique:brands,Btitle',
            'Bdetail' => 'required|max:1000',
            'Bimage' => 'image|mimes:png,jpg',
        ];
    }
}

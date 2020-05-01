<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
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
            'Btitle' => 'unique:brands,Btitle',
            'Bdetail' => 'max:1000',
            'Bimage' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}

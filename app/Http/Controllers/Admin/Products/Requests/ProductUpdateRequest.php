<?php

namespace App\Http\Controllers\Admin\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'Pcode' => 'integer|min:1',
            'PbrandId' => 'integer|min:1',
            'PcategoryId' => 'integer|min:1',
            'Pname' => 'max:150',
            'Pdescription' => 'max:1000',
            'PsellerId' => 'integer|min:1',
            'Pwholesaleprice' => 'integer',
            'Pretailprice' => 'integer',
            'Psaleprice' => 'integer',
            'Pimage1' => 'image|mimes:png,jpg|max:2048',
            'Pimage2' => 'image|mimes:png,jpg|max:2048',
            'Pimage3' => 'image|mimes:png,jpg|max:2048',
            'Pimage4' => 'image|mimes:png,jpg|max:2048',
            'Pimage5' => 'image|mimes:png,jpg|max:2048',
            'Pmetatitle' => 'max:500',
            'Pmetakeyword' => 'max:20',
            'Pmetadescription' => 'max:1000',
            'PrelatedProducts' => 'integer|min:1',
        ];
    }
}

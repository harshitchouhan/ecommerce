<?php

namespace App\Http\Controllers\Admin\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'Pcode' => 'required|integer|min:1',
            'PbrandId' => 'required|integer|min:1',
            'PcategoryId' => 'required|integer|min:1',
            'Pname' => 'required|max:150',
            'Pdescription' => 'required|max:1000',
            'PsellerId' => 'required|integer|min:1',
            'Pwholesaleprice' => 'required|integer',
            'Pretailprice' => 'required|integer',
            'Psaleprice' => 'required|integer',
            'Pimage1' => 'image|mimes:png,jpg|max:2048',
            'Pimage2' => 'image|mimes:png,jpg|max:2048',
            'Pimage3' => 'image|mimes:png,jpg|max:2048',
            'Pimage4' => 'image|mimes:png,jpg|max:2048',
            'Pimage5' => 'image|mimes:png,jpg|max:2048',
            'Pmetatitle' => 'required|max:500',
            'Pmetakeyword' => 'required|max:20',
            'Pmetadescription' => 'required|max:1000',
            'PrelatedProducts' => 'required|integer',
        ];
    }
}

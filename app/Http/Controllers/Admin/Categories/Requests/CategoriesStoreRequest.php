<?php

namespace App\Http\Controllers\Admin\Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesStoreRequest extends FormRequest
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
            'Cpid' => 'required|min:1|integer',
            'Cname' => 'required|max:150',
            'Cdetail' => 'required|max:1000',
            'Cimage' => 'image|mimes:png,jpg|max:2048',
            'Cmetatitle' => 'required|max:500',
            'Cmetakeyword' => 'required|max:20',
            'Cmetadescription' => 'required|max:1000'
        ];
    }
}

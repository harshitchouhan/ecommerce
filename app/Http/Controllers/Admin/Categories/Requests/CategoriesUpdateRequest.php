<?php

namespace App\Http\Controllers\Admin\Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesUpdateRequest extends FormRequest
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
            'Cpid' => 'min:1|integer',
            'Cname' => 'max:150',
            'Cdetail' => 'max:1000',
            'Cimage' => 'image|mimes:png,jpg|max:2048',
            'Cmetatitle' => 'max:500',
            'Cmetakeyword' => 'max:20',
            'Cmetadescription' => 'max:1000'
        ];
    }
}

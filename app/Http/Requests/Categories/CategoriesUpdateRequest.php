<?php

namespace App\Http\Requests\Categories;

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
            'C_pid' => 'min:1|integer',
            'C_name' => 'max:150',
            'C_detail' => 'max:1000',
            'C_image' => 'image|mimes:jpg,png',
            'C_metatitle' => 'max:500',
            'C_metakeyword' => 'max:20',
            'C_metadescription' => 'max:1000'
        ];
    }
}

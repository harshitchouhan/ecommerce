<?php

namespace App\Http\Requests\Categories;

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
            'C_pid' => 'required|min:1|integer',
            'C_name' => 'required|max:150',
            'C_detail' => 'required|max:1000',
            'C_image' => 'image|mimes:jpg,png',
            'C_metatitle' => 'required|max:500',
            'C_metakeyword' => 'required|max:20',
            'C_metadescription' => 'required|max:1000'
        ];
    }
}

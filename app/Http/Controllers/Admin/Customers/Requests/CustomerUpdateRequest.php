<?php

namespace App\Http\Controllers\Admin\Customers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'cname' => 'max:150',
            'cimage' => 'image|mimes:png,jpg|max:2048',
            'cphone' => 'max:15',
            'calternatephone' => 'max:15'
        ];
    }
}

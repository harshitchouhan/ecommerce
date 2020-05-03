<?php

namespace App\Http\Controllers\Admin\Customers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'cname' => 'required|max:150',
            'cemail' => 'required',
            'cimage' => 'image|mimes:png,jpg|max:2048',
            'caddressline1' => 'required',
            'ccity' => 'required',
            'cstate' => 'required',
            'czipcode' => 'required',
            'cphone' => 'required|max:15',
            'calternatephone' => 'max:15'
        ];
    }
}

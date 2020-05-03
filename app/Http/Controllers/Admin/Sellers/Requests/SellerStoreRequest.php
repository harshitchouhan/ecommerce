<?php

namespace App\Http\Controllers\Admin\Sellers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerStoreRequest extends FormRequest
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
            'sname' => 'required|max:150',
            'semail' => 'required',
            'simage' => 'image|mimes:png,jpg|max:2048',
            'saddressline1' => 'required',
            'scity' => 'required',
            'sstate' => 'required',
            'szipcode' => 'required',
            'sphone' => 'required|max:15',
            'salternatephone' => 'max:15'
        ];
    }
}

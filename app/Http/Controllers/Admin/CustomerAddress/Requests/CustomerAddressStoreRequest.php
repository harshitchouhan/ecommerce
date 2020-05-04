<?php

namespace App\Http\Controllers\Admin\CustomerAddress\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddressStoreRequest extends FormRequest
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
            'caownername' => 'required',
            'caaddressline1' => 'required',
            'cacity' => 'required|integer',
            'castate' => 'required|integer',
            'cazipcode' => 'required'
        ];
    }
}

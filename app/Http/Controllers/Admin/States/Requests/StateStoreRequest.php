<?php

namespace App\Http\Controllers\Admin\States\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateStoreRequest extends FormRequest
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
            'statename' => 'required',
            'statecode' => 'required|integer',
            'stateactive' => 'required|integer|min:0|max:1'
        ];
    }
}

<?php

namespace App\Http\Controllers\Admin\Wishlist\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WishlistUpdateRequest extends FormRequest
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
            'wcid' => 'integer|min:0',
            'wpid' => 'integer|min:0'
        ];
    }
}

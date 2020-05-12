<?php

namespace App\Http\Controllers\Admin\Shipping;

use League\Fractal\TransformerAbstract;

class ShippingTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Shipping $shipping)
    {
        return [
            'id' => $shipping->id,
            'Title' => $shipping->sptitle,
            'Rate' => $shipping->sprate,
            'State' => $shipping->spstate,
            'Active' => $shipping->spactive,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'Title' => 'sptitle',
            'Rate' => 'sprate',
            'State' => 'spstate',
            'Active' => 'spactive',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'sptitle' => 'Title',
            'sprate' => 'Rate',
            'spstate' => 'State',
            'spactive' => 'Active',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

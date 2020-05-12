<?php

namespace App\Http\Controllers\Admin\Discounts;

use League\Fractal\TransformerAbstract;

class DiscountTransformer extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Discount $discount)
    {
        return [
            'id' => $discount->id,
            'Name' => $discount->dname,
            'Code' => $discount->dcode,
            'Value' => $discount->dvalue,
            'Type' => $discount->dtype,
            'Uses' => $discount->duses,
            'StartDate' => $discount->dstartdate,
            'ExpiryDate' => $discount->dexpirydate,
            'Active' => $discount->dactive,
            'Basis' => $discount->dbasis,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'Name' => 'dname',
            'Code' => 'dcode',
            'Value' => 'dvalue',
            'Type' => 'dtype',
            'Uses' => 'duses',
            'StartDate' => 'dstartdate',
            'ExpiryDate' => 'dexpirydate',
            'Active' => 'dactive',
            'Basis' => 'dbasis',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {

        $attributes = [
            'id' => 'id',
            'dname' => 'Name',
            'dcode' => 'Code',
            'dvalue' => 'Value',
            'dtype' => 'Type',
            'duses' => 'Uses',
            'dstartdate' => 'StartDate',
            'dexpirydate' => 'ExpiryDate',
            'dactive' => 'Active',
            'dbasis' => 'Basis',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

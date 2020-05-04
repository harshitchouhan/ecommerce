<?php

namespace App\Http\Controllers\Admin\CustomerAddress;

use League\Fractal\TransformerAbstract;

class CustomerAddressTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(CustomerAddress $customerAddress)
    {
        return [
            'id' => $customerAddress->id,
            'OwnerName' => $customerAddress->caownername,
            'Address1' => $customerAddress->caaddressline1,
            'Address2' => $customerAddress->caaddressline2,
            'City' => $customerAddress->cacity,
            'State' => $customerAddress->castate,
            'Zipcode' => $customerAddress->cazipcode,
            'created_at' => $customerAddress->created_at,
            'updated_at' => $customerAddress->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'OwnerName' => 'caownername',
            'Address1' => 'caaddressline1',
            'Address2' => 'caaddressline2',
            'City' => 'cacity',
            'State' => 'castate',
            'Zipcode' => 'cazipcode',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'caownername' => 'OwnerName',
            'caaddressline1' => 'Address1',
            'caaddressline2' => 'Address2',
            'cacity' => 'City',
            'castate' => 'State',
            'cazipcode' => 'Zipcode',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

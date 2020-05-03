<?php

namespace App\Http\Controllers\Admin\Customers;

use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Customer $customer)
    {
        return [
            'id' => $customer->id,
            'name' => $customer->cname,
            'email' => $customer->cemail,
            'image' => $customer->cimage,
            'address1' => $customer->caddressline1,
            'address2' => $customer->caddressline2,
            'city' => $customer->ccity,
            'state' => $customer->cstate,
            'zipcode' => $customer->czipcode,
            'googleid' => $customer->cgoogleid,
            'faceboookid' => $customer->cfaceboookid,
            'linkedinid' => $customer->clinkedinid,
            'status' => $customer->cstatus,
            'phone' => $customer->cphone,
            'alternatephone' => $customer->calternatephone,
            'created_at' => $customer->created_at,
            'updated_at' => $customer->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'cname',
            'email' => 'cemail',
            'image' => 'cimage',
            'addressline1' => 'caddressline1',
            'addressline2' => 'caddressline2',
            'city' => 'ccity',
            'state' => 'cstate',
            'zipcode' => 'czipcode',
            'googleid' => 'cgoogleid',
            'faceboookid' => 'cfaceboookid',
            'linkedinid' => 'clinkedinid',
            'status' => 'cstatus',
            'phone' => 'cphone',
            'alternatephone' => 'calternatephone',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'cname' => 'name',
            'cemail' => 'email',
            'cimage' => 'image',
            'caddressline1' => 'addressline1',
            'caddressline2' => 'addressline2',
            'ccity' => 'city',
            'cstate' => 'state',
            'czipcode' => 'zipcode',
            'cgoogleid' => 'googleid',
            'cfaceboookid' => 'faceboookid',
            'clinkedinid' => 'linkedinid',
            'cstatus' => 'status',
            'cphone' => 'phone',
            'calternatephone' => 'alternatephone',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

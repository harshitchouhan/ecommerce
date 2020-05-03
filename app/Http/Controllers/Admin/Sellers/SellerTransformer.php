<?php

namespace App\Http\Controllers\Admin\Sellers;

use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Seller $seller)
    {
        return [
            'id' => $seller->id,
            'name' => $seller->sname,
            'email' => $seller->semail,
            'image' => $seller->simage,
            'address1' => $seller->saddressline1,
            'address2' => $seller->saddressline2,
            'city' => $seller->scity,
            'state' => $seller->sstate,
            'zipcode' => $seller->szipcode,
            'googleid' => $seller->sgoogleid,
            'faceboookid' => $seller->sfaceboookid,
            'linkedinid' => $seller->slinkedinid,
            'status' => $seller->sstatus,
            'phone' => $seller->sphone,
            'alternatephone' => $seller->salternatephone,
            'created_at' => $seller->created_at,
            'updated_at' => $seller->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'sname',
            'email' => 'semail',
            'image' => 'simage',
            'addressline1' => 'saddressline1',
            'addressline2' => 'saddressline2',
            'city' => 'scity',
            'state' => 'sstate',
            'zipcode' => 'szipcode',
            'googleid' => 'sgoogleid',
            'faceboookid' => 'sfaceboookid',
            'linkedinid' => 'slinkedinid',
            'status' => 'sstatus',
            'phone' => 'sphone',
            'alternatephone' => 'salternatephone',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'sname' => 'name',
            'semail' => 'email',
            'simage' => 'image',
            'saddressline1' => 'addressline1',
            'saddressline2' => 'addressline2',
            'scity' => 'city',
            'sstate' => 'state',
            'szipcode' => 'zipcode',
            'sgoogleid' => 'googleid',
            'sfaceboookid' => 'faceboookid',
            'slinkedinid' => 'linkedinid',
            'sstatus' => 'status',
            'sphone' => 'phone',
            'salternatephone' => 'alternatephone',
            'sreated_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

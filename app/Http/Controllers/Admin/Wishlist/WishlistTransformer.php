<?php

namespace App\Http\Controllers\Admin\Wishlist;

use League\Fractal\TransformerAbstract;

class WishlistTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Wishlist $wishlist)
    {
        return [
            'id' => $wishlist->id,
            'CategoryId' => $wishlist->wcid,
            'ProductsId' => $wishlist->wpid
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'CategoryId' => 'wcid',
            'ProductsId' => 'wpid',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'wcid' => 'CategoryId',
            'wpid' => 'ProductsId',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

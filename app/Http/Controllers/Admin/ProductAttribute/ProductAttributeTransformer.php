<?php

namespace App\Http\Controllers\Admin\ProductAttribute;

use League\Fractal\TransformerAbstract;

class ProductAttributeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductAttribute $productAttribute)
    {
        return [
            'id' => $productAttribute->id,
            'name' => $productAttribute->PAname,
            'value' => $productAttribute->PAvalue,
            'detail' => $productAttribute->PAdetail,
            'filter' => $productAttribute->PAfilter,
            'status' => $productAttribute->PAstatus,
            'image' => $productAttribute->PAimage,
            'category' => $productAttribute->PAcategory,
            'created_at' => $productAttribute->created_at,
            'updated_at' => $productAttribute->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'PAname',
            'value' => 'PAvalue',
            'detail' => 'PAdetail',
            'filter' => 'PAfilter',
            'status' => 'PAstatus',
            'image' => 'PAimage',
            'category' => 'PAcategory',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {

        $attributes = [
            'id' => 'id',
            'PAname' => 'name',
            'PAvalue' => 'value',
            'PAdetail' => 'detail',
            'PAfilter' => 'filter',
            'PAstatus' => 'status',
            'PAimage' => 'image',
            'PAcategory' => 'category',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

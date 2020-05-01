<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Http\Controllers\Admin\Brands\Brand;
use League\Fractal\TransformerAbstract;

class BrandTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Brand $brand)
    {
        return [
            'id' => $brand->id,
            'title' => $brand->Btitle,
            'detail' => $brand->Bdetail,
            'image' => $brand->Bimage,
            'status' => $brand->Bstatus,
            'created_at' => $brand->created_at,
            'updated_at' => $brand->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'title' => 'Btitle',
            'detail' => 'Bdetail',
            'image' => 'Bimage',
            'status' => 'Bstatus',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'Btitle' => 'title',
            'Bdetail' => 'detail',
            'Bimage' => 'image',
            'Bstatus' => 'status',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

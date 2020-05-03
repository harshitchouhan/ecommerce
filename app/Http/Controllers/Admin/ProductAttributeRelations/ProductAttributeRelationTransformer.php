<?php

namespace App\Http\Controllers\Admin\ProductAttributeRelations;

use App\Http\Controllers\Admin\ProductAttributeRelations\ProductAttributeRelation;
use League\Fractal\TransformerAbstract;

class ProductAttributeRelationTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductAttributeRelation $productAttributeRelation)
    {
        return [
            'id' => $productAttributeRelation->id,
            'pid' => $productAttributeRelation->parpid,
            'aid' => $productAttributeRelation->paraid,
            'vid' => $productAttributeRelation->parvid,
            'created_at' => $productAttributeRelation->created_at,
            'updated_at' => $productAttributeRelation->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'pid' => 'parpid',
            'aid' => 'paraid',
            'vid' => 'parvid',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {

        $attributes = [
            'id' => 'id',
            'parpid' => 'pid',
            'paraid' => 'aid',
            'parvid' => 'vid',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

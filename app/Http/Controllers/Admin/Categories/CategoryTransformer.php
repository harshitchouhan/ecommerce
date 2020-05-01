<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\Categories\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'pid' => $category->Cpid,
            'name' => $category->Cname,
            'detail' => $category->Cdetail,
            'image' => $category->Cimage,
            'status' => $category->Cstatus,
            'metatitle' => $category->Cmetatitle,
            'metakeyword' => $category->Cmetakeyword,
            'metadescription' => $category->Cmetadescription,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'pid' => 'Cpid',
            'name' => 'Cname',
            'detail' => 'Cdetail',
            'image' => 'Cimage',
            'status' => 'Cstatus',
            'metatitle' => 'Cmetatitle',
            'metakeyword' => 'Cmetakeyword',
            'metadescription' => 'Cmetadescription',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'Cpid' => 'pid',
            'Cname' => 'name',
            'Cdetail' => 'detail',
            'Cimage' => 'image',
            'Cstatus' => 'status',
            'Cmetatitle' => 'metatitle',
            'Cmetakeyword' => 'metakeyword',
            'Cmetadescription' => 'metadescription',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        // dd($attributes[$index]);

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

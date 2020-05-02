<?php

namespace App\Http\Controllers\Admin\Products;

use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'code' => $product->Pcode,
            'brandId' => $product->PbrandId,
            'categoryId' => $product->PcategoryId,
            'name' => $product->Pname,
            'description' => $product->Pdescription,
            'sellerId' => $product->PsellerId,
            'wholesaleprice' => $product->Pwholesaleprice,
            'retailprice' => $product->Pretailprice,
            'saleprice' => $product->Psaleprice,
            'status' => $product->Pstatus,
            'image1' => $product->Pimage1,
            'image2' => $product->Pimage2,
            'image3' => $product->Pimage3,
            'image4' => $product->Pimage4,
            'image5' => $product->Pimage5,
            'video' => $product->Pvideo,
            'metatitle' => $product->Pmetatitle,
            'metakeyword' => $product->Pmetakeyword,
            'metadescription' => $product->Pmetadescription,
            'relatedProducts' => $product->PrelatedProducts,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'code' => 'Pcode',
            'brandId' => 'PbrandId',
            'categoryId' => 'PcategoryId',
            'name' => 'Pname',
            'description' => 'Pdescription',
            'sellerId' => 'PsellerId',
            'wholesaleprice' => 'Pwholesaleprice',
            'retailprice' => 'Pretailprice',
            'saleprice' => 'Psaleprice',
            'status' => 'Pstatus',
            'image1' => 'Pimage1',
            'image2' => 'Pimage2',
            'image3' => 'Pimage3',
            'image4' => 'Pimage4',
            'image5' => 'Pimage5',
            'video' => 'Pvideo',
            'metatitle' => 'Pmetatitle',
            'metakeyword' => 'Pmetakeyword',
            'metadescription' => 'Pmetadescription',
            'relatedProducts' => 'PrelatedProducts',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'Pcode' => 'code',
            'PbrandId' => 'brandId',
            'PcategoryId' => 'categoryId',
            'Pname' => 'name',
            'Pdescription' => 'description',
            'PsellerId' => 'sellerId',
            'Pwholesaleprice' => 'wholesaleprice',
            'Pretailprice' => 'retailprice',
            'Psaleprice' => 'saleprice',
            'Pstatus' => 'status',
            'Pimage1' => 'image1',
            'Pimage2' => 'image2',
            'Pimage3' => 'image3',
            'Pimage4' => 'image4',
            'Pimage5' => 'image5',
            'Pvideo' => 'video',
            'Pmetatitle' => 'metatitle',
            'Pmetakeyword' => 'metakeyword',
            'Pmetadescription' => 'metadescription',
            'PrelatedProducts' => 'relatedProducts',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        // dd($attributes[$index]);

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

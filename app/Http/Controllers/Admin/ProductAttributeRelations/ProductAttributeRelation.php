<?php

namespace App\Http\Controllers\Admin\ProductAttributeRelations;

use App\Http\Controllers\Admin\ProductAttributeRelations\ProductAttributeRelationTransformer;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeRelation extends Model
{
    protected $fillable = ['parpid', 'paraid'];

    public $transformer = ProductAttributeRelationTransformer::class;

    public function getAllProductAttributeRelation()
    {
        $productAttributeRelations = ProductAttributeRelation::all();
        return $productAttributeRelations;
    }

    public function getProductAttributeRelation($id)
    {
        $productAttributeRelation = ProductAttributeRelation::findOrFail($id);
        return $productAttributeRelation;
    }

    public function storeProductAttributeRelation($request)
    {
        $data = $request->all();
        $productAttributeRelation = ProductAttributeRelation::create($data);
        return $productAttributeRelation;
    }

    public function updateProductAttributeRelation($request, $id)
    {
        $productAttributeRelation = $this->getProductAttributeRelation($id);

        if ($request->has('parpid')) {
            $productAttributeRelation->parpid = $request->parpid;
        }

        if ($request->has('paraid')) {
            $productAttributeRelation->paraid = $request->paraid;
        }

        if (!$productAttributeRelation->isDirty()) {
            return false;
        }

        $productAttributeRelation->save();
        return $productAttributeRelation;
    }

    public function deleteProductAttributeRelation($id)
    {
        $productAttributeRelation = $this->getProductAttributeRelation($id);
        $productAttributeRelation->delete();
        return $productAttributeRelation;
    }
}

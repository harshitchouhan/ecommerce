<?php

namespace App\Http\Controllers\Admin\ProductAttributeValues;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = ['pavaid', 'pavvalue', 'pavstatus'];

    public $transformer = ProductAttributeValueTransformer::class;

    public function getAllProductAttributeValues()
    {
        $productAttributeValues = ProductAttributeValue::all();
        return $productAttributeValues;
    }

    public function getProductAttributeValue($id)
    {
        $productAttributeValue = ProductAttributeValue::findOrFail($id);
        return $productAttributeValue;
    }

    public function storeProductAttributeValue($request)
    {
        $data = $request->all();
        $productAttributeValue = ProductAttributeValue::create($data);
        return $productAttributeValue;
    }

    public function updateProductAttributeValue($request, $id)
    {
        $productAttributeValue = $this->getProductAttributeValue($id);

        if ($request->has('pavaid')) {
            $productAttributeValue->pavaid = $request->pavaid;
        }

        if ($request->has('pavvalue')) {
            $productAttributeValue->pavvalue = $request->pavvalue;
        }

        if ($request->has('pavstatus')) {
            $productAttributeValue->pavstatus = $request->pavstatus;
        }

        if (!$productAttributeValue->isDirty()) {
            return false;
        }

        $productAttributeValue->save();
        return $productAttributeValue;
    }

    public function deleteProductAttributeValue($id)
    {
        $productAttributeValue = $this->getProductAttributeValue($id);
        $productAttributeValue->delete();
        return $productAttributeValue;
    }
}

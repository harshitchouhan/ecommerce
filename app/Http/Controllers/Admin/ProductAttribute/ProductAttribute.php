<?php

namespace App\Http\Controllers\Admin\ProductAttribute;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use ImageUpload;
    protected $fillable = ['PAname', 'PAvalue', 'PAdetail', 'PAfilter', 'PAstatus', 'PAimage', 'PAcategory'];

    public $transformer = ProductAttributeTransformer::class;

    public function getAllProductAttributes()
    {
        $productAttributes = ProductAttribute::all();
        return $productAttributes;
    }

    public function getProductAttribute($id)
    {
        $productAttributes = ProductAttribute::findOrFail($id);
        return $productAttributes;
    }

    public function storeProductAttribute($request)
    {
        $data = $request->all();

        if ($request->has('image')) {
            $filePath = $this->getImage($request, 'image', $request->PAname, 'productAttributes');
            $data['PAimage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        $data['PAstatus'] = '0';

        $productAttribute = ProductAttribute::create($data);
        return $productAttribute;
    }

    public function updateProductAttribute($request, $id)
    {
        $productAttribute = $this->getProductAttribute($id);

        if ($request->has('PAname')) {
            $productAttribute->PAname = $request->PAname;
        }

        if ($request->has('PAvalue')) {
            $productAttribute->PAvalue = $request->PAvalue;
        }

        if ($request->has('PAdetail')) {
            $productAttribute->PAdetail = $request->PAdetail;
        }

        if ($request->has('PAfilter')) {
            $productAttribute->PAfilter = $request->PAfilter;
        }

        if ($request->has('PAstatus')) {
            $productAttribute->PAstatus = $request->PAstatus;
        }

        if ($request->has('PAimage')) {
            $filePath = $this->getImage($request, 'image', $request->PAname, 'productAttributes');
            $data['PAimage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        if ($request->has('PAcategory')) {
            $productAttribute->PAcategory = $request->PAcategory;
        }

        if (!$productAttribute->isDirty()) {
            return false;
        }

        $productAttribute->save();
        return $productAttribute;
    }

    public function deleteProductAttribute($id)
    {
        $productAttribute = $this->getProductAttribute($id);
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $productAttribute->PAimage));
        $productAttribute->delete();
        return $productAttribute;
    }
}

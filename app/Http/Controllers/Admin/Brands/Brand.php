<?php

namespace App\Http\Controllers\Admin\Brands;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['B_title', 'B_detail', 'B_image', 'B_status'];

    public function getAllBrands()
    {
        $brand = Brand::all();
        return $brand;
    }

    public function getBrand($id)
    {
        $brand = Brand::findOrFail($id);
        return $brand;
    }

    public function storeBrand($request)
    {
        $data = $request->all();
        $data['B_image'] = 'user.jpg';
        $data['B_status'] = '0';

        $brand = Brand::create($data);
        return $brand;
    }

    public function updateBrand($request, $id)
    {
        $brand = $this->getBrand($id);

        if ($request->has('B_title')) {
            $brand->B_title = $request->B_title;
        }

        if ($request->has('B_detail')) {
            $brand->B_detail = $request->B_detail;
        }

        if ($request->has('B_image')) {
            $brand->B_image = $request->B_image;
        }

        if ($request->has('B_status')) {
            $brand->B_status = $request->B_status;
        }

        if (!$brand->isDirty()) {
            return false;
        }

        $brand->save();
        return $brand;
    }

    public function deleteBrand($id)
    {
        $brand = $this->getBrand($id);
        $brand->delete();
        return $brand;
    }
}

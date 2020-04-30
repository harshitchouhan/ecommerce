<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use ImageUpload;
    protected $fillable = ['B_title', 'B_detail', 'B_image', 'B_status'];


    public function getImageAttribute()
    {
        return $this->B_image;
    }

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

        if ($request->has('B_image')) {
            // Get image file
            $image = $request->file('B_image');
            // Make a image name based on brand name and current timestamp
            $name = Str::slug($request->input('B_title')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/brands/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->imageUpload($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $data['B_image'] = $filePath;
        }

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
            // Get image file
            $image = $request->file('B_image');
            // Make a image name based on brand name and current timestamp
            $name = Str::slug($request->input('B_title') ? $request->input('B_title') : $brand->B_title).'_'.time();
            // Define folder path
            $folder = '/uploads/images/brands/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->imageUpload($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $brand->B_image = $filePath;
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

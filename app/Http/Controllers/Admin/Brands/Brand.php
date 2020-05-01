<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{

    use ImageUpload;
    protected $fillable = ['Btitle', 'Bdetail', 'Bimage', 'Bstatus'];

    public $transformer = BrandTransformer::class;

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

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on brand name and current timestamp
            $name = Str::slug($request->input('Btitle')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/brands/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->imageUpload($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $data['Bimage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        $data['Bstatus'] = '0';

        $brand = Brand::create($data);
        return $brand;
    }

    public function updateBrand($request, $id)
    {
        $brand = $this->getBrand($id);

        if ($request->has('Btitle')) {
            $brand->Btitle = $request->Btitle;
        }

        if ($request->has('Bdetail')) {
            $brand->Bdetail = $request->Bdetail;
        }

        if ($request->has('Bimage')) {
            // Get image file
            $image = $request->file('Bimage');
            // Make a image name based on brand name and current timestamp
            $name = Str::slug($request->input('Btitle') ? $request->input('Btitle') : $brand->Btitle) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/brands/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->imageUpload($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $brand->Bimage = $filePath;
        }

        if ($request->has('Bstatus')) {
            $brand->Bstatus = $request->Bstatus;
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
        $this->imageDelete($brand->Bimage);
        $brand->delete();
        return $brand;
    }
}

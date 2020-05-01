<?php

namespace App\Http\Controllers\Admin\Categories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\ImageUpload;


class Category extends Model
{
    use ImageUpload;
    protected $fillable = ['Cpid', 'Cname', 'Cdetail', 'Cimage', 'Cstatus', 'Cmetatitle', 'Cmetakeyword', 'Cmetadescription'];

    public $transformer = CategoryTransformer::class;

    public function getAllCategories()
    {
        $categories = Category::all();
        return $categories;
    }

    public function getCategory($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function storeCategory($request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on brand name and current timestamp
            $name = Str::slug($request->input('Cname')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/categories/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->imageUpload($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $data['Cimage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        $data['Cstatus'] = '0';

        $category = Category::create($data);
        return $category;
    }

    public function updateCategory($request, $id)
    {
        $category = $this->getCategory($id);

        if ($request->has('Cpid')) {
            $category->Cpid = $request->Cpid;
        }

        if ($request->has('Cname')) {
            $category->Cname = $request->Cname;
        }

        if ($request->has('Cdetail')) {
            $category->Cdetail = $request->Cdetail;
        }

        if ($request->has('Cimage')) {
            $category->Cimage = $request->Cimage;
        }

        if ($request->has('Cstatus')) {
            $category->Cstatus = $request->Cstatus;
        }

        if ($request->has('Cmetatitle')) {
            $category->Cmetatitle = $request->Cmetatitle;
        }

        if ($request->has('Cmetakeyword')) {
            $category->Cmetakeyword = $request->Cmetakeyword;
        }

        if ($request->has('Cmetadescription')) {
            $category->Cmetadescription = $request->Cmetadescription;
        }

        if (!$category->isDirty()) {
            return false;
        }

        $category->save();
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = $this->getCategory($id);
        $category->delete();
        return $category;
    }
}

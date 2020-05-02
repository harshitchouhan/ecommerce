<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\Products\Product;
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
            $filePath = $this->getImage($request, 'image', $request->Cname, 'categories');
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
            $filePath = $this->getImage($request, 'image', $category->Cname, 'categories');
            $category->Cimage = 'http://ecommerce.test/app/public' . $filePath;
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
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $category->Cimage));
        $category->delete();
        return $category;
    }
}

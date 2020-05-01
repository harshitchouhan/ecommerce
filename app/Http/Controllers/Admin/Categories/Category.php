<?php

namespace App\Http\Controllers\Admin\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
        $data['Cstatus'] = '0';
        $data['Cimage'] = 'category.jpg';

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

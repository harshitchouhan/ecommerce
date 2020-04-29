<?php

namespace App\Http\Controllers\Admin\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['C_pid', 'C_name', 'C_detail', 'C_image', 'C_status', 'C_metatitle', 'C_metakeyword', 'C_metadescription'];

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
        $data['C_status'] = '0';
        $data['C_image'] = 'category.jpg';

        $category = Category::create($data);
        return $category;
    }

    public function updateCategory($request, $id)
    {
        $category = $this->getCategory($id);

        if ($request->has('C_pid')) {
            $category->C_pid = $request->C_pid;
        }

        if ($request->has('C_name')) {
            $category->C_name = $request->C_name;
        }

        if ($request->has('C_detail')) {
            $category->C_detail = $request->C_detail;
        }

        if ($request->has('C_image')) {
            $category->C_image = $request->C_image;
        }

        if ($request->has('C_status')) {
            $category->C_status = $request->C_status;
        }

        if ($request->has('C_metatitle')) {
            $category->C_metatitle = $request->C_metatitle;
        }

        if ($request->has('C_metakeyword')) {
            $category->C_metakeyword = $request->C_metakeyword;
        }

        if ($request->has('C_metadescription')) {
            $category->C_metadescription = $request->C_metadescription;
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

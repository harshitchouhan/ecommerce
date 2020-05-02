<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Admin\Categories\Requests\CategoriesStoreRequest;
use App\Http\Controllers\Admin\Categories\Requests\CategoriesUpdateRequest;
use App\Http\Controllers\Admin\Categories\CategoryTransformer;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. CategoryTransformer::class)->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = new Category();
        $categories = $categories->getAllCategories();
        return $this->showAll($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesStoreRequest $request)
    {
        $category = new Category();
        $newCategory = $category->storeCategory(request());
        return $this->showOne($newCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = new Category();
        return $this->showOne($category->getCategory($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesUpdateRequest $request, $id)
    {
        $category = new Category();
        $updatedCategory = $category->updateCategory(request(), $id);

        if(!$updatedCategory) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = new Category();
        $deletedCategory = $category->deleteCategory($id);
        return $this->showOne($deletedCategory);
    }
}

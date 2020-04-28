<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->showAll($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'C_pid' => 'required|min:1|integer',
            'C_name' => 'required|max:150',
            'C_detail' => 'required|max:1000',
            'C_image' => 'image|mimes:jpg,png',
            'C_metatitle' => 'required|max:500',
            'C_metakeyword' => 'required|max:20',
            'C_metadescription' => 'required|max:1000'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['C_status'] = '0';
        $data['C_image'] = 'category.jpg';

        $category = Category::create($data);
        return $this->showOne($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $this->showOne($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $rules = [
            'C_pid' => 'min:1|integer',
            'C_name' => 'max:150',
            'C_detail' => 'max:1000',
            'C_image' => 'image|mimes:jpg,png',
            'C_metatitle' => 'max:500',
            'C_metakeyword' => 'max:20',
            'C_metadescription' => 'max:1000'
        ];

        $this->validate($request, $rules);

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
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        $category->save();
        return $this->showOne($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return $this->showOne($category);
    }
}

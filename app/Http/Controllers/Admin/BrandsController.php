<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->json([
            'results' => count($brands),
            'data' => $brands,
        ]);
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
            'B_title' => 'required',
            'B_detail' => 'required|max:1000',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['B_image'] = 'user.jpg';
        $data['B_status'] = '0';

        $brand = Brand::create($data);
        return response()->json(['results' => 1, 'data' => $brand]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return response()->json([
            'results' => 1,
            'data' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $rules = [
            'B_detail' => 'max:1000',
        ];

        $this->validate($request, $rules);

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
            return response()->json([
                'error' => 'You need to specify different value to update',
            ]);
        }

        $brand->save();
        return response()->json([
            'results' => 1,
            'data' => $brand,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return response()->json([
            'results' => 1,
            'data' => $brand,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->showAll($products);
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
            'p_code' => 'required|integer|min:1',
            'p_brandid' => 'required|integer|min:1',
            'p_categoryid' => 'required|integer|min:1',
            'p_name' => 'required|max:150',
            'p_description' => 'required|max:1000',
            'p_wholesaleprice' => 'required',
            'p_retailprice' => 'required',
            'p_saleprice' => 'required',
            'p_image1' => 'image|mimes:jpg,png',
            'p_image2' => 'image|mimes:jpg,png',
            'p_image3' => 'image|mimes:jpg,png',
            'p_image4' => 'image|mimes:jpg,png',
            'p_image5' => 'image|mimes:jpg,png',
            'p_metatitle' => 'required|max:500',
            'p_metakeyword' => 'required|max:20',
            'p_metadescription' => 'required|max:1000',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['p_status'] = '0';
        $data['p_video'] = 'video-1.mp4';
        $data['p_relatedProdcuts'] = '0';

        $product = Product::create($data);
        return $this->showOne($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $this->showOne($product);
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
        $product = Product::findOrFail($id);

        $rules = [
            'p_code' => 'integer|min:1',
            'p_brandid' => 'integer|min:1',
            'p_categoryid' => 'integer|min:1',
            'p_name' => 'max:150',
            'p_description' => 'max:1000',
            'p_image1' => 'image|mimes:jpg,png',
            'p_image2' => 'image|mimes:jpg,png',
            'p_image3' => 'image|mimes:jpg,png',
            'p_image4' => 'image|mimes:jpg,png',
            'p_image5' => 'image|mimes:jpg,png',
            'p_metatitle' => 'max:500',
            'p_metakeyword' => 'max:20',
            'p_metadescription' => 'max:1000',
        ];

        $this->validate($request, $rules);

        if ($request->has('p_code')) {
            $product->p_code = $request->p_code;
        }

        if ($request->has('p_brandid')) {
            $product->p_brandid = $request->p_brandid;
        }

        if ($request->has('p_categoryid')) {
            $product->p_categoryid = $request->p_categoryid;
        }

        if ($request->has('p_name')) {
            $product->p_name = $request->p_name;
        }

        if ($request->has('p_description')) {
            $product->p_description = $request->p_description;
        }

        if ($request->has('p_wholesaleprice')) {
            $product->p_wholesaleprice = $request->p_wholesaleprice;
        }

        if ($request->has('p_retailprice')) {
            $product->p_retailprice = $request->p_retailprice;
        }

        if ($request->has('p_saleprice')) {
            $product->p_saleprice = $request->p_saleprice;
        }

        if ($request->has('p_status')) {
            $product->p_status = $request->p_status;
        }

        if ($request->has('p_image1')) {
            $product->p_image1 = $request->p_image1;
        }

        if ($request->has('p_image2')) {
            $product->p_image2 = $request->p_image2;
        }

        if ($request->has('p_image3')) {
            $product->p_image3 = $request->p_image3;
        }

        if ($request->has('p_image4')) {
            $product->p_image4 = $request->p_image4;
        }

        if ($request->has('p_image5')) {
            $product->p_image5 = $request->p_image5;
        }

        if ($request->has('p_video')) {
            $product->p_video = $request->p_video;
        }

        if ($request->has('p_metatitle')) {
            $product->p_metatitle = $request->p_metatitle;
        }

        if ($request->has('p_metakeyword')) {
            $product->p_metakeyword = $request->p_metakeyword;
        }

        if ($request->has('p_metadescription')) {
            $product->p_metadescription = $request->p_metadescription;
        }

        if ($request->has('p_relatedProducts')) {
            $product->p_relatedProducts = $request->p_relatedProducts;
        }

        if (!$product->isDirty()) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        $product->save();
        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return $this->showOne($product);
    }
}

<?php

namespace App\Http\Controllers\Admin\Sellers;

use App\Http\Controllers\Admin\Sellers\Requests\SellerStoreRequest;
use App\Http\Controllers\Admin\Sellers\Requests\SellerUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class SellerController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. SellerTransformer::class)->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = new Seller();
        return $this->showAll($sellers->getAllSellers());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellerStoreRequest $request)
    {
        $seller = new Seller();
        $newSeller = $seller->storeSeller(request());
        return $this->showOne($newSeller);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = new Seller();
        return $this->showOne($seller->getSeller($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SellerUpdateRequest $request, $id)
    {
        $seller = new Seller();
        $updatedSeller = $seller->updateSeller(request(), $id);

        if(!$updatedSeller) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedSeller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = new Seller();
        $deletedSeller = $seller->deleteSeller($id);
        return $this->showOne($deletedSeller);
    }
}

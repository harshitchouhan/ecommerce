<?php

namespace App\Http\Controllers\Admin\Wishlist;

use App\Http\Controllers\Admin\Wishlist\Requests\WishlistStoreRequest;
use App\Http\Controllers\Admin\Wishlist\Requests\WishlistUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class WishlistController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. WishlistTransformer::class)->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = new Wishlist();
        return $this->showAll($wishlists->getAllWishlist());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WishlistStoreRequest $request)
    {
        $wishlist = new Wishlist();
        $newWishlist = $wishlist->storeWishlist(request());
        return $this->showOne($newWishlist);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wishlist = new Wishlist();
        return $this->showOne($wishlist->getWishlist($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WishlistUpdateRequest $request, $id)
    {
        $wishlist = new Wishlist();
        $updatedWishlist = $wishlist->updateWishlist(request(), $id);

        if(!$updatedWishlist) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedWishlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = new Wishlist();
        $deletedWishlist = $wishlist->deleteWishlist($id);
        return $this->showOne($deletedWishlist);
    }
}

<?php

namespace App\Http\Controllers\Admin\Wishlist;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['wcid', 'wpid'];

    public $transformer = WishlistTransformer::class;

    public function getAllWishlist()
    {
        $wishlists = Wishlist::all();
        return $wishlists;
    }

    public function getWishlist($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return $wishlist;
    }

    public function storeWishlist($request)
    {
        $data = $request->all();
        $wishlist = Wishlist::create($data);
        return $wishlist;
    }

    public function updateWishlist($request, $id)
    {
        $wishlist = $this->getWishlist($id);

        if ($request->has('wcid')) {
            $wishlist->wcid = $request->wcid;
        }

        if ($request->has('wpid')) {
            $wishlist->wpid = $request->wpid;
        }

        if (!$wishlist->isDirty()) {
            return false;
        }

        $wishlist->save();
        return $wishlist;
    }

    public function deleteWishlist($id)
    {
        $wishlist = $this->getWishlist($id);
        $wishlist->delete();
        return $wishlist;
    }
}

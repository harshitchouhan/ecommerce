<?php

namespace App\Http\Controllers\Admin\Sellers;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use ImageUpload;
    protected $fillable = ['sname', 'semail', 'simage', 'saddressline1', 'saddressline2', 'scity', 'sstate', 'szipcode', 'sgoogleid', 'sfaceboookid', 'slinkedinid', 'sstatus', 'sphone', 'salternatephone'];

    public $transformer = SellerTransformer::class;

    public function getAllSellers()
    {
        $sellers = Seller::all();
        return $sellers;
    }

    public function getSeller($id)
    {
        $seller = Seller::findOrFail($id);
        return $seller;
    }

    public function storeSeller($request)
    {
        $data = $request->all();

        if ($request->has('image')) {
            $filePath = $this->getImage($request, 'image', $request->sname, 'sellers');
            $data['simage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        $data['sstatus'] = '0';

        $seller = Seller::create($data);
        return $seller;
    }

    public function updateSeller($request, $id)
    {
        $seller = $this->getSeller($id);

        if ($request->has('sname')) {
            $seller->sname = $request->sname;
        }

        if ($request->has('semail')) {
            $seller->semail = $request->semail;
        }

        if ($request->has('image')) {
            $filePath = $this->getImage($request, 'image', $request->sname, 'sellers');
            $data['simage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        if ($request->has('saddressline1')) {
            $seller->saddressline1 = $request->saddressline1;
        }

        if ($request->has('saddressline2')) {
            $seller->saddressline2 = $request->saddressline2;
        }

        if ($request->has('scity')) {
            $seller->scity = $request->scity;
        }

        if ($request->has('sstate')) {
            $seller->sstate = $request->sstate;
        }

        if ($request->has('szipcode')) {
            $seller->szipcode = $request->szipcode;
        }

        if ($request->has('sgoogleid')) {
            $seller->sgoogleid = $request->sgoogleid;
        }

        if ($request->has('sfaceboookid')) {
            $seller->sfaceboookid = $request->sfaceboookid;
        }

        if ($request->has('slinkedinid')) {
            $seller->slinkedinid = $request->slinkedinid;
        }

        if ($request->has('sstatus')) {
            $seller->sstatus = $request->sstatus;
        }

        if ($request->has('sphone')) {
            $seller->sphone = $request->sphone;
        }

        if ($request->has('salternatephone')) {
            $seller->salternatephone = $request->salternatephone;
        }

        if (!$seller->isDirty()) {
            return false;
        }

        $seller->save();
        return $seller;
    }

    public function deleteSeller($id)
    {
        $seller = $this->getSeller($id);
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $seller->simage));
        $seller->delete();
        return $seller;
    }
}

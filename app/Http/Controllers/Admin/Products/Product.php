<?php

namespace App\Http\Controllers\Admin\Products;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ImageUpload;
    protected $fillable = ['Pcode', 'PbrandId', 'PcategoryId', 'Pname', 'Pdescription', 'PsellerId', 'Pwholesaleprice', 'Pretailprice', 'Psaleprice', 'Pstatus', 'Pimage1', 'Pimage2', 'Pimage3', 'Pimage4', 'Pimage5', 'Pvideo', 'Pmetatitle', 'Pmetakeyword', 'Pmetadescription', 'PrelatedProducts'];

    public $transformer = ProductTransformer::class;

    public function getAllProducts()
    {
        $products = Product::all();
        return $products;
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function storeProduct($request)
    {
        $data = $request->all();

        if ($request->has('image1')) {
            $filePath = $this->getImage($request, 'image1', $request->Pname, 'products', 1);
            $data['Pimage1'] = 'http://ecommerce.test/app/public/' . $filePath;
        }

        if ($request->has('image2')) {
            $filePath = $this->getImage($request, 'image2', $request->Pname, 'products', 2);
            $data['Pimage2'] = 'http://ecommerce.test/app/public/' . $filePath;
        }

        if ($request->has('image3')) {
            $filePath = $this->getImage($request, 'image3', $request->Pname, 'products', 3);
            $data['Pimage3'] = 'http://ecommerce.test/app/public/' . $filePath;
        }

        if ($request->has('image4')) {
            $filePath = $this->getImage($request, 'image4', $request->Pname, 'products', 4);
            $data['Pimage4'] = 'http://ecommerce.test/app/public/' . $filePath;
        }

        if ($request->has('image5')) {
            $filePath = $this->getImage($request, 'image5', $request->Pname, 'products', 5);
            $data['Pimage5'] = 'http://ecommerce.test/app/public/' . $filePath;
        }

        $data['Pvideo'] = 'video-1.mp4';
        $data['PrelatedProdcuts'] = '0';

        $product = Product::create($data);
        return $product;
    }

    public function updateProduct($request, $id)
    {

        $product = $this->getProduct($id);

        if ($request->has('Pcode')) {
            $product->Pcode = $request->Pcode;
        }

        if ($request->has('PbrandId')) {
            $product->PbrandId = $request->PbrandId;
        }

        if ($request->has('PcategoryId')) {
            $product->PcategoryId = $request->PcategoryId;
        }

        if ($request->has('Pname')) {
            $product->Pname = $request->Pname;
        }

        if ($request->has('Pdescription')) {
            $product->Pdescription = $request->Pdescription;
        }

        if ($request->has('PsellerId')) {
            $product->PsellerId = $request->PsellerId;
        }

        if ($request->has('Pwholesaleprice')) {
            $product->Pwholesaleprice = $request->Pwholesaleprice;
        }

        if ($request->has('Pretailprice')) {
            $product->Pretailprice = $request->Pretailprice;
        }

        if ($request->has('Psaleprice')) {
            $product->Psaleprice = $request->Psaleprice;
        }

        if ($request->has('Pstatus')) {
            $product->Pstatus = $request->Pstatus;
        }

        if ($request->has('Pimage1')) {
            $filePath = $this->getImage($request, 'image1', $request->Pname, 'products', 1);
            $product->Pimage1 = 'http://ecommerce.test/app/public/' . $filePath;
        }

        if ($request->has('Pimage2')) {
            $filePath = $this->getImage($request, 'image2', $request->Pname, 'products', 2);
            $product->Pimage2 = 'http://ecommerce.test/app/public/' . $filePath;
        }

        if ($request->has('Pimage3')) {
            $filePath = $this->getImage($request, 'image3', $request->Pname, 'products', 3);
            $product->Pimage3 = 'http://ecommerce.test/app/public/' . $filePath;        }

        if ($request->has('Pimage4')) {
            $filePath = $this->getImage($request, 'image4', $request->Pname, 'products', 4);
            $product->Pimage4 = 'http://ecommerce.test/app/public/' . $filePath;        }

        if ($request->has('Pimage5')) {
            $filePath = $this->getImage($request, 'image5', $request->Pname, 'products', 5);
            $product->Pimage5 = 'http://ecommerce.test/app/public/' . $filePath;        }

        if ($request->has('Pvideo')) {
            $product->Pvideo = $request->Pvideo;
        }

        if ($request->has('Pmetatitle')) {
            $product->Pmetatitle = $request->Pmetatitle;
        }

        if ($request->has('Pmetakeyword')) {
            $product->Pmetakeyword = $request->Pmetakeyword;
        }

        if ($request->has('Pmetadescription')) {
            $product->Pmetadescription = $request->Pmetadescription;
        }

        if ($request->has('PrelatedProducts')) {
            $product->PrelatedProducts = $request->PrelatedProducts;
        }

        if (!$product->isDirty()) {
            return false;
        }

        $product->save();
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->getProduct($id);
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $product->Pimage1));
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $product->Pimage2));
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $product->Pimage3));
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $product->Pimage4));
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $product->Pimage5));
        $product->delete();
        return $product;
    }
}

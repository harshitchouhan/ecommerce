<?php

use App\Http\Controllers\Admin\Brands\Brand;
use App\Http\Controllers\Admin\Categories\Category;
use App\Http\Controllers\Admin\Customers\Customer;
use App\Http\Controllers\Admin\ProductAttribute\ProductAttribute;
use App\Http\Controllers\Admin\ProductAttributeRelations\ProductAttributeRelation;
use App\Http\Controllers\Admin\ProductAttributeValue\ProductAttributeValue;
use App\Http\Controllers\Admin\Products\Product;
use App\Http\Controllers\Admin\Sellers\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brandsQuantity = 10;
        $CategoriesQuantity = 10;
        $ProductsQuantity = 10;
        $ProductAttributeQuantity = 10;
        $ProductAttributeRelationQuantity = 10;
        $CustomerQuantity = 10;
        $SellersQuantity = 10;
        $ProductAttributeValueQuantity = 10;

        // factory(Brand::class, $brandsQuantity)->create();
        // factory(Category::class, $CategoriesQuantity)->create();
        // factory(Product::class, $ProductsQuantity)->create();
        // factory(ProductAttribute::class, $ProductAttributeQuantity)->create();
        // factory(ProductAttributeRelation::class, $ProductAttributeRelationQuantity)->create();
        // factory(Customer::class, $CustomerQuantity)->create();
        // factory(Seller::class, $SellersQuantity)->create();
        factory(ProductAttributeValue::class, $ProductAttributeValueQuantity)->create();
    }
}

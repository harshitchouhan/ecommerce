<?php

use App\Http\Controllers\Admin\Brands\Brand;
use App\Http\Controllers\Admin\Categories\Category;
use App\Http\Controllers\Admin\City\City;
use App\Http\Controllers\Admin\CustomerAddress\CustomerAddress;
use App\Http\Controllers\Admin\Customers\Customer;
use App\Http\Controllers\Admin\Discounts\Discount;
use App\Http\Controllers\Admin\ProductAttribute\ProductAttribute;
use App\Http\Controllers\Admin\ProductAttributeRelations\ProductAttributeRelation;
use App\Http\Controllers\Admin\ProductAttributeValues\ProductAttributeValue;
use App\Http\Controllers\Admin\Products\Product;
use App\Http\Controllers\Admin\Sellers\Seller;
use App\Http\Controllers\Admin\Shipping\Shipping;
use App\Http\Controllers\Admin\States\State;
use App\Http\Controllers\Admin\Wishlist\Wishlist;
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
        $CustomerAddressQuantity = 10;
        $CitiesQuantity = 10;
        $StatesQuantity = 10;
        $DiscountsQuantity = 10;
        $ShippingQuantity = 10;
        $WishlistQuantity = 10;

        // factory(Brand::class, $brandsQuantity)->create();
        // factory(Category::class, $CategoriesQuantity)->create();
        // factory(Product::class, $ProductsQuantity)->create();
        // factory(ProductAttribute::class, $ProductAttributeQuantity)->create();
        // factory(ProductAttributeRelation::class, $ProductAttributeRelationQuantity)->create();
        // factory(Customer::class, $CustomerQuantity)->create();
        // factory(Seller::class, $SellersQuantity)->create();
        // factory(ProductAttributeValue::class, $ProductAttributeValueQuantity)->create();
        // factory(CustomerAddress::class, $CustomerAddressQuantity)->create();
        // factory(City::class, $CitiesQuantity)->create();
        // factory(State::class, $StatesQuantity)->create();
        // factory(Discount::class, $DiscountsQuantity)->create();
        // factory(Shipping::class, $ShippingQuantity)->create();
        factory(Wishlist::class, $WishlistQuantity)->create();
    }
}

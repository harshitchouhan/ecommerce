<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('brands', 'Admin\Brands\BrandsController');
Route::resource('categories', 'Admin\Categories\CategoryController');
Route::resource('products', 'Admin\Products\ProductsController');
Route::resource('productAttributes', 'Admin\ProductAttribute\ProductAttributeController');
Route::resource('productAttributeRelations', 'Admin\ProductAttributeRelations\ProductAttributeRelationController');
Route::resource('productAttributeValues', 'Admin\ProductAttributeValues\ProductAttributeValueController');
Route::resource('customers', 'Admin\Customers\CustomerController');
Route::resource('customerAddress', 'Admin\CustomerAddress\CustomerAddressController');
Route::resource('sellers', 'Admin\Sellers\SellerController');
Route::resource('city', 'Admin\City\CityController');
Route::resource('state', 'Admin\States\StateController');
Route::resource('discount', 'Admin\Discounts\DiscountController');
Route::resource('shipping', 'Admin\Shipping\ShippingController');

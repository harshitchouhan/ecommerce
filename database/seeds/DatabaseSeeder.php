<?php

use App\Brand;
use App\Category;
use App\Product;
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

        // Brand::turncate();
        // Category::turncate();

        $brandsQuantity = 10;
        $CategoriesQuantity = 10;
        $ProductsQuantity = 10;

        factory(Brand::class, $brandsQuantity)->create();
        factory(Category::class, $CategoriesQuantity)->create();
        factory(Product::class, $ProductsQuantity)->create();
    }
}

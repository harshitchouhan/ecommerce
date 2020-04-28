<?php

use App\Brand;
use App\Category;
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

        $brandsQuantity = 30;
        $CategoriesQuantity = 10;

        factory(Brand::class, $brandsQuantity)->create();
        factory(Category::class, $CategoriesQuantity)->create();
    }
}

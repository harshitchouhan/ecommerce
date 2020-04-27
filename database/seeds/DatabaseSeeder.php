<?php

use App\Brand;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brandsQuantity = 30;
        factory(Brand::class, $brandsQuantity)->create();
    }
}

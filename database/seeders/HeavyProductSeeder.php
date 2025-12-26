<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Product\Database\Factories\ProductFactory;

class HeavyProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Generate 2000 simple products
        ProductFactory::new()->count(2000)->simple()->create();
    }
}

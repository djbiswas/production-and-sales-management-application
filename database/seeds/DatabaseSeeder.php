<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(StockUnitSeeder::class);
        $this->call(StockItemGroupSeeder::class);
        $this->call(StockItemTypeSeeder::class);
        $this->call(TaxCategorySeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(ProductModelSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(CostPricingPolicySeeder::class);
        $this->call(SalePricingPolicySeeder::class);


    }
}

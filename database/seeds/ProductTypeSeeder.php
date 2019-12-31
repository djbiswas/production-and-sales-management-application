<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTypes = [
            ['product_type_name' => 'tiles'],
            ['product_type_name' => 'Ceramic'],
            ['product_type_name' => 'Stone'],
            ['product_type_name' => 'Sand'],
            ['product_type_name' => 'Dyes'],
            ['product_type_name' => 'Chemical'],
            ['product_type_name' => 'Other']
        ];
        foreach ($productTypes as $productType){

            \App\ProductType::create($productType);
        }
    }
}

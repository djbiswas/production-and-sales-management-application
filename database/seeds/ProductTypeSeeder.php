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
            ['product_type_name' => 'Ceramic']
        ];
        foreach ($productTypes as $productType){

            \App\ProductType::create($productType);
        }
    }
}

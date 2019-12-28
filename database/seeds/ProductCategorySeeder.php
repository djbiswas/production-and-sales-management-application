<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategories = [
            ['product_category_name' => 'A'],
            ['product_category_name' => 'B'],
            ['product_category_name' => 'C'],
            ['product_category_name' => 'customized'],
        ];

        foreach ($productCategories as $productCategory){

            \App\ProductCategory::create($productCategory);
        }
    }
}

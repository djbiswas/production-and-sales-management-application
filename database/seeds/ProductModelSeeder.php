<?php

use Illuminate\Database\Seeder;

class ProductModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = ['R', 'B', 'GR', 'Y'];

        for( $i=201; $i <= 229; $i++){
            foreach ($models as $model){
                $setModel = [
                    'product_type_id' =>($i<229)?1:2,
                    'product_model_name' =>'SST '.$model.' '.$i,
                    'stock_item_group_id' => 3,
                    'tax_category_id' => 1,
                    'stock_unit_id' => 3,
                ];
                \App\ProductModel::create($setModel);

            }
        }
        $stoneNothers = [
            ['product_type_id' => 3, 'product_model_name' => 'Stone 1/2 inch',  'stock_item_group_id' => 3, 'tax_category_id' => 1,'stock_unit_id' => 4 ],
            ['product_type_id' => 3, 'product_model_name' => 'Stone 1/4 inch',  'stock_item_group_id' => 1, 'tax_category_id' => 1,'stock_unit_id' => 4],
            ['product_type_id' => 3, 'product_model_name' => 'Stone 3/4 inch',  'stock_item_group_id' => 3, 'tax_category_id' => 1,'stock_unit_id' => 4],
            ['product_type_id' => 3, 'product_model_name' => 'Stone 5/6 inch',  'stock_item_group_id' => 3, 'tax_category_id' => 1,'stock_unit_id' => 4],
            ['product_type_id' => 3, 'product_model_name' => 'Stone 5/8 inch',  'stock_item_group_id' => 3, 'tax_category_id' => 1,'stock_unit_id' => 4],
        ];

        foreach ($stoneNothers as $stoneNother){
            \App\ProductModel::create($stoneNother);
        }
    }
}

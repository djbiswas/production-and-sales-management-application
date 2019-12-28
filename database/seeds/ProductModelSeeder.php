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
                $setModel = ['product_type_id' =>($i<229)?1:2, 'product_model_name' =>'SST '.$model.' '.$i ];
                \App\ProductModel::create($setModel);
            }
        }


    }
}

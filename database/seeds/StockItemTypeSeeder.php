<?php

use Illuminate\Database\Seeder;

class StockItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockItemTypes = [
            ['stock_type_name' => 'Stock-N-Sell']
        ];

        foreach ($stockItemTypes as $stockItemType){
            \App\StockItemType::create($stockItemType);
        }
    }
}

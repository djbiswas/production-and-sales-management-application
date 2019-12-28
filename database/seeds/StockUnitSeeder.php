<?php

use Illuminate\Database\Seeder;

class StockUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockUnits = [

            ['unit_name' => 'CFT'],
            ['unit_name' => 'PCS'],
            ['unit_name' => 'KG'],
            ['unit_name' => 'TON'],
        ];

       foreach ($stockUnits as $stockUnit){
           \App\StockUnit::create($stockUnit);
       }
    }
}

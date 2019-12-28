<?php

use Illuminate\Database\Seeder;

class StockItemClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockClasses = [
            ['item_class_name' => 'Dyes'],
            ['item_class_name' => 'Chemical'],
        ];

        foreach ($stockClasses as $stockClass){

            \App\StockItemClass::create($stockClass);
        }
    }
}

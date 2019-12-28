<?php

use Illuminate\Database\Seeder;

class StockItemGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockGroups = [
          ['group_name' => 'Raw Materials'],
          ['group_name' => 'Work-in-process'],
          ['group_name' => 'Finished Goods'],

        ];
        foreach ($stockGroups as $stockGroup){

            \App\StockItemGroup::create($stockGroup);
        }
    }
}

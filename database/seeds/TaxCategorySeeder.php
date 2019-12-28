<?php

use Illuminate\Database\Seeder;

class TaxCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxCategories = [
            ['tax_name' => 'Exempted']
        ];
        foreach ($taxCategories as $taxCategory){

            \App\TaxCategory::create($taxCategory);
        }
    }
}

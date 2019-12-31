<?php

use Illuminate\Database\Seeder;

class SalePricingPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salePricingPolicies = [
            ['sale_policy_name' => 'poc', 'description' => 'percentage on cost price'],
            ['sale_policy_name' => 'foc', 'description' => 'fixed amount on cost price'],
            ['sale_policy_name' => 'custom', 'description' => 'Sales price will set manually'],
        ];

        foreach ($salePricingPolicies as $salePricingPolicy){
            \App\SalePricingPolicy::create($salePricingPolicy);
        }
    }
}

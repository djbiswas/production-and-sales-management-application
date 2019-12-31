<?php

use Illuminate\Database\Seeder;

class CostPricingPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $costPolicies = [
            ['policy_name' => 'LIFO', 'description' => null],
            ['policy_name' => 'FIFO', 'description' => null],
            ['policy_name' => 'AVERAGE'],
            ['policy_name' => 'WEIGHTED AVERAGE', 'description' => null],
            ['policy_name' => 'MAX PRICE', 'description' => null],
        ];

        foreach ($costPolicies as $costPolicy){
            \App\CostPricingPolicy::create($costPolicy);
        }
    }
}

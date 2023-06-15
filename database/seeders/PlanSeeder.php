<?php
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            ['name' => 'Basic', 'price' => 9.99],
            ['name' => 'Standard', 'price' => 19.99],
            ['name' => 'Premium', 'price' => 29.99],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}

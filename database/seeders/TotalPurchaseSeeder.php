<?php

namespace Database\Seeders;

use App\Models\TotalPurchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TotalPurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TotalPurchase::factory(10)->create();
    }
}

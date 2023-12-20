<?php

namespace Database\Seeders;

use App\Models\Logistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logistics = ['委外取件', '委外送件', '客戶取件', '客戶送件', '委外取不良', '客戶取不良'];
        foreach ($logistics as $logistic) {
            Logistic::create([
                'name' => $logistic,
            ]);
        }
    }
}

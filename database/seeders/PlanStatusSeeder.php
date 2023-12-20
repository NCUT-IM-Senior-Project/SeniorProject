<?php

namespace Database\Seeders;

use App\Models\PlanStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['未安排', '已安排', '未完成', '已完成', '已取消'];
        foreach ($statuses as $status){
            PlanStatus::create([
                'name' => $status,
            ]);
        }
    }
}

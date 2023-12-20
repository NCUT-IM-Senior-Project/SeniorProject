<?php

namespace Database\Seeders;

use App\Models\PlanDetailStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanDetailStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['待執行', '前往中', '抵達', '卸貨中', '完成', '取消', '已加入配送單', '已安排排程'];
        foreach ($statuses as $status){
            PlanDetailStatus::create([
                'name' => $status,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\DeliveryOrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ['待確認', '未安排', '已安排', '未完成','已完成', '已取消'];
        foreach ($status as $statu) {
            DeliveryOrderStatus::create([
                'name' => $statu,
            ]);
        }
    }
}

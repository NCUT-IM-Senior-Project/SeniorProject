<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class, //權限
            ClientSeeder::class, //客戶
            VendorSeeder::class, //廠商
            ContactPersonSeeder::class, //聯絡人
            UserSeeder::class, //使用者帳號
            CarSeeder::class, //車輛
            RotationListSeeder::class, //輪值名單
            RotationDataSeeder::class, //輪值資料
            RequirementItemSeeder::class, //需求項目
            RequirementDataSeeder::class, //需求資料
            DeliveryOrderStatusSeeder::class, //出貨單狀態
            LogisticSeeder::class, //物流
            DeliveryOrderSeeder::class, //出貨單
            DeliveryVendorDetailsSeeder::class, //廠商送貨單明細
            DeliveryClientDetailsSeeder::class, //客戶送貨單明細
            PlanStatusSeeder::class, //排程狀態
            PlanDetailStatusSeeder::class, //排程細項狀態
            DeliveryServiceOrderSeeder::class, //送貨單
            DeliveryPlanDetailsSeeder::class, //排程細項

        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\DeliveryOrder;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DeliveryOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('zh_TW');

        $clientIds = Client::all()->pluck('partner_id')->toArray();
        $vendorIds = Vendor::all()->pluck('partner_id')->toArray();

        for ($i = 0; $i < 5; $i++) { //1~5
            //客戶送貨單
            DeliveryOrder::create([
                'keynote' => '測試資料',
                'partner_id' => $clientIds[array_rand($clientIds)],
                'order_number' => 'B' . str_pad(mt_rand(1, 999999999), 10, '0', STR_PAD_LEFT),
                'logistics_id' => $faker->numberBetween(2, 3),
                'scheduled_at' => null,
                'shipment_at' => $faker->dateTimeBetween('now', '+1 week'),
                'delivery_status_id' => 1,
                'created_by' => 1,
            ]);
        }

        for ($i = 0; $i < 5; $i++) { //6~10
            //廠商送貨單
            DeliveryOrder::create([
                'keynote' => '測試資料',
                'partner_id' => $vendorIds[array_rand($vendorIds)],
                'order_number' => 'P' . str_pad(mt_rand(1, 999999999), 10, '0', STR_PAD_LEFT),
                'logistics_id' => $faker->numberBetween(0, 1),
                'scheduled_at' => $faker->dateTimeBetween('now', '+2 week'),
                'shipment_at' => $faker->dateTimeBetween('now', '+1 week'),
                'delivery_status_id' => 1,
                'created_by' => 1,
            ]);
        }
    }
}

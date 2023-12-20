<?php

namespace Database\Seeders;

use App\Models\DeliveryVendorDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DeliveryVendorDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('zh_TW');

        for ($i = 1; $i < 6; $i++) {
            //廠商送貨單明細
            DeliveryVendorDetails::create([
                'delivery_order_id' => $i,
                'specification' => $faker->word,
                'quantity' => 1,
                'main_color' => $faker->colorName,
                'work_number' => '10KG',
                'description' => $faker->realText(20),
            ]);
        }

    }
}

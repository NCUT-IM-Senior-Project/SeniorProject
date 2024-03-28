<?php

namespace Database\Seeders;

use App\Models\DeliveryClientDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DeliveryClientDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('zh_TW');

        for ($i = 6; $i < 11; $i++) {
            //廠商送貨單明細
            DeliveryClientDetail::create([
                'delivery_order_id' => $i,
                'name' => $faker->word,
                'specification' => $faker->word,
                'quantity' => 1,
                'description' => $faker->realText(20),
            ]);
        }
    }
}

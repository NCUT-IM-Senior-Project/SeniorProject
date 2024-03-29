<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\RequirementData;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RequirementDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('zh_TW');

        $clientIds = Client::all()->pluck('partner_id')->toArray();
        //$vendorIds = Vendor::all()->pluck('vendor_id')->toArray();

        foreach ($clientIds as $clientId) {
            RequirementData::create([
                'partner_id' => $clientId,
                'requirement_items_id' => $faker->randomElement(['1', '2']),
            ]);
        }
    }
}

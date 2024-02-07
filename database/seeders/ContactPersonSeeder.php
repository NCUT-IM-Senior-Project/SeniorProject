<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ContactPerson;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ContactPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('zh_TW');

        $clientIds = Client::all()->pluck('partner_id')->toArray();
        $vendorIds = Vendor::all()->pluck('partner_id')->toArray();

        foreach ($clientIds as $clientId) {
            ContactPerson::create([
                'partner_id' => $clientId,
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
            ]);
        }

        foreach ($vendorIds as $vendorId) {
            ContactPerson::create([
                'partner_id' => $vendorId,
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}

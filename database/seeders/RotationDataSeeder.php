<?php

namespace Database\Seeders;

use App\Models\RotationData;
use App\Models\RotationList;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RotationDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('zh_TW');

        $rotationLists = RotationList::all();
        $driverIds = User::Where('permission_id', 2)->pluck('id')->toArray();
        foreach ($rotationLists as $rotationList) {
            for ($i = 0; $i < 6; $i++){
                RotationData::create([
                    'rotation_list_id' => $rotationList->id,
                    'driver_id' => $faker->randomElement($driverIds),
                    'start_at' => $faker->dateTimeBetween('now', $endDate = '+ 1 days'),
                    'end_at' => $faker->dateTimeBetween('now', $endDate = '+ 3 days'),
                ]);
            }
        }
    }
}

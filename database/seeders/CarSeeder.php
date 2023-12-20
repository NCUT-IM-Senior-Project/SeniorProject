<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('zh_TW');
        $colors = ['白色', '黑色', '藍色', '灰色', '銀色'];

        $drivers = User::where('permission_id', 2)->pluck('id')->toArray();
        foreach ($drivers as $driver) {
            Car::create([
                'number' => $faker->unique()->regexify('[0-9]{3}-[0-9]{4}'),
                'brand' => 'Toyota',
                'color' => $faker->randomElement($colors),
                'type' => $faker->randomElement(['小客車', '小貨車', '大貨車']),
                'Oils' => $faker->randomElement(['92', '95', '98', '柴油']),
                'tonnage' => $faker->randomElement(['3.5', '5']),
                'tailgate' => $faker->boolean(),
                'driver_id' => $driver,
            ]);
        }
    }
}

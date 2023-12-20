<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\DeliveryServiceOrder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryServiceOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all();
        $drivers = User::where('permission_id', 2)->get();
        for ($i = 0; $i < 3; $i++) {
            DeliveryServiceOrder::create([
                'keynote' => '測試出貨單',
                'car_id' => $cars->random()->id,
                'driver_id' => $drivers->random()->id,
                'plan_id' => 1,
                'departure_at' => now()->addWeek(),
                'return_at' => now()->addWeeks(2),
                'created_by' => 1,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\DeliveryPlanDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryPlanDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 6; $i++) {
            DeliveryPlanDetails::create([
                'delivery_service_id' => 1,
                'delivery_order_id' => $i,
                'sequence' => $i,
                'plans_details_status_id' => 1,
                'departure_at' => null,
                'arrival_at' => null,
                'start_unload_at' => null,
                'end_unload_at' => null,
                'pictrue' => null,
            ]);
        }

        for ($i = 6; $i < 11; $i++) {
            DeliveryPlanDetails::create([
                'delivery_service_id' => 2,
                'delivery_order_id' => $i,
                'sequence' => $i-5,
                'plans_details_status_id' => 1,
                'departure_at' => null,
                'arrival_at' => null,
                'start_unload_at' => null,
                'end_unload_at' => null,
                'pictrue' => null,
            ]);
        }
    }
}

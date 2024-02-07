<?php

namespace Database\Seeders;

use App\Models\RotationList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RotationListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 4; $i++) {
            RotationList::create([
                'partner_id' => $i,
            ]);
        }
    }
}

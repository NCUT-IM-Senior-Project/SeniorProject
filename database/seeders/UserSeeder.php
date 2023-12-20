<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //生管人員帳號
        User::factory(2)->create([
            'permission_id' => 1,
        ]);

        //司機帳號
        User::factory(5)->create([
            'permission_id' => 2,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\RequirementItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequirementItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = ['備油壓車','需要尾門'];
        foreach ($items as $item){
            RequirementItem::create([
                'name' => $item
            ]);
        }
    }
}

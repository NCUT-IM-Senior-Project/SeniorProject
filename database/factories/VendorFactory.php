<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partner_id' => 'B' . str_pad($this->faker->unique()->randomNumber(4), 4, '0', STR_PAD_LEFT),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'land_line' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(),
        ];
    }
}

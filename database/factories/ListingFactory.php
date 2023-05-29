<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'beds' => fake()->numberBetween(1, 7),
            'bathrooms' => fake()->numberBetween(1, 3),
            'area' => fake()->numberBetween(30, 40),
            'city' => fake()->city(),
            'postcode' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_no' => fake()->numberBetween(10, 200),
            'price' => fake()->numberBetween(50_000, 2_000_000),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\CarCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model_name' => sprintf(
                '%s car model',
                fake()->name
            ),
            'car_category_id' => fake()->randomElement(CarCategory::query()->pluck('id')->toArray())
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
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
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));

        return [
            'category_id' => rand(1, 5),
            'brand_id' => rand(1, 5),
            'name' => $title = $faker->vehicle,
            'slug' => str($title)->slug(),
            'price' => rand(100000, 1000000),
            'quantity' => rand(1, 15),
            'description' => $this->faker->sentence(),
        ];
    }
}


<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
         return [
            'title' => $this->faker->unique()->words(3, true), 
            'sku' => strtoupper($this->faker->unique()->bothify('SKU-####-??')), 
            'brand' => $this->faker->company, 
            'price' => $this->faker->randomFloat(2, 500, 10000), 
            'details' => json_encode([
                'description' => $this->faker->sentence(8),
                'usage' => $this->faker->sentence(12),
                'contraindications' => $this->faker->sentence(10),
                'nutrition' => [
                    'proteins' => $this->faker->randomFloat(1, 0, 30) . ' г',
                    'fats' => $this->faker->randomFloat(1, 0, 10) . ' г',
                    'carbs' => $this->faker->randomFloat(1, 0, 20) . ' г',
                    'calories' => $this->faker->numberBetween(10, 500) . ' ккал',
                ]
            ]),
            'image' => $this->faker->imageUrl(640, 480, 'products', true, 'Faker'), 
            'category_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model =Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->word(),
            "description" => $this->faker->word(),
            "sku" => "12345". $this->faker->word(),
            "price" =>$this->faker->numberBetween(10000,100000),
            "stock" =>$this->faker->randomNumber(),
            "category_id" =>$this->faker->randomElement(Category::pluck('id'))
        ];
    }
}

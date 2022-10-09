<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShoeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => $this->faker->sentence,
            'description'      => $this->faker->text(20),
            'price'      => $this->faker->numberBetween(200,100),
            'stock'      => $this->faker->numberBetween(1,60),
            'user_id'=>1,
            'category_id'=>1,
            // 'slug'=>$this->faker->sentence,
            'model_id'=>1,
            'brand_id'=>1,




        ];
    }
}

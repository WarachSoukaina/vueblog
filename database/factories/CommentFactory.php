<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
       
        return [
            'content' => $faker->paragraph(10),
            'user_id' => $faker->randomDigit(1,10),
            'post_id' => $faker->randomDigit(1,10)
              ];
    }
}

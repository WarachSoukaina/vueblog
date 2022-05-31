<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $title = $faker->sentence(5);


        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $faker->paragraph(10),
            'user_id' => $faker->randomDigit(1,10),
            'category_id' => $faker->randomDigit(1,10)
              ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'contact_info' => $this->faker->phoneNumber(),
            'arrive' => $this->faker->date(),
            'departure' => $this->faker->date(),
            'current_location' => $this->faker->city(),
            'comment' => $this->faker->text(),
            'passport' => 'images/SAmEisuMeXDUz5nI5TeSziVjlyVdLKLK4xqs6Ioc.jpg',
            'passport_arrival' => 'images/SAmEisuMeXDUz5nI5TeSziVjlyVdLKLK4xqs6Ioc.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

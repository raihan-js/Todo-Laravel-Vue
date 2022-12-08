<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    

     public function definition()
    {
        return [
            //
        ];
    }
}

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'text' => $faker->sentence,
    ];
});
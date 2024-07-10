<?php

namespace App\Modules\Author\Factories;

use App\Modules\Author\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Author\Models\Author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
        ];
    }
}

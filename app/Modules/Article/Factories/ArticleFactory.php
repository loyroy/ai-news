<?php

namespace App\Modules\Article\Factories;

use App\Modules\Article\Enums\ArticleLocation;
use App\Modules\Article\Models\Article;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Article\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [
            'author_id' => $this->getRandomAuthorId(),
            'title' => $faker->text(mt_rand(75,150)),
            'content' => $faker->text(mt_rand(1000,5000)),
            'published_at' => Carbon::now(),
        ];
    }

    private function getRandomAuthorId(): ?int
    {
        $author = DB::table('authors')->inRandomOrder()->first();
        return $author?->id;
    }
}

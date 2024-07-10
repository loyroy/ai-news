<?php

namespace App\Modules\Article\Seeders;

use App\Modules\Article\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()
            ->count(50)
            ->create();
    }
}

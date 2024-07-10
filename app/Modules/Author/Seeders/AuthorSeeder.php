<?php

namespace App\Modules\Author\Seeders;

use App\Modules\Author\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()
            ->count(10)
            ->create();
    }
}

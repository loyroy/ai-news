<?php

namespace App\Modules\Author\Seeders;

use App\Modules\Author\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{

    private array $authors = [
        [
            'name' => 'High Baron Grathlar',
        ],
        [
            'name' => 'Jonathan News',
        ],
        [
            'name' => 'Stray Cat #43',
        ],
        [
            'name' => 'Literally just Ted Cruz',
        ],
        [
            'name' => 'Shibuya Tan Man',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->authors as $author) {
            Author::factory()
                ->create($author);
        }
    }
}

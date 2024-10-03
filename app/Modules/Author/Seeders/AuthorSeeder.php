<?php

namespace App\Modules\Author\Seeders;

use App\Modules\Author\Models\Author;
use App\Modules\Author\Repositories\Contracts\AuthorRepositoryInterface;
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

    public function __construct(
        private readonly AuthorRepositoryInterface $authorRepository,
    )
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->authors as $author) {
            if (!$this->authorRepository->getByName($author['name'])) {
                Author::factory()
                    ->create($author);
            }
        }
    }
}

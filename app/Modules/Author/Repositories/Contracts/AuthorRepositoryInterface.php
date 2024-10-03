<?php

namespace App\Modules\Author\Repositories\Contracts;

use App\Modules\Author\Models\Author;

interface AuthorRepositoryInterface
{
    public function getByName(string $name): ?Author;
}

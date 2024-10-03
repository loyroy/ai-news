<?php

namespace App\Modules\Author\Repositories;

use App\Modules\Author\Models\Author;
use App\Modules\Author\Repositories\Contracts\AuthorRepositoryInterface;
use App\Modules\Base\Repositories\BaseRepository;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    protected ?string $model = Author::class;

    public function getByName(string $name): ?Author
    {
        return $this->getQueryBuilder()
            ->where('name', $name)
            ->first();
    }
}

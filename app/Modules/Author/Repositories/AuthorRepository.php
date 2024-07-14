<?php

namespace App\Modules\Author\Repositories;

use App\Modules\Author\Models\Author;
use App\Modules\Base\Repositories\BaseRepository;

class AuthorRepository extends BaseRepository
{
    protected ?string $model = Author::class;
}

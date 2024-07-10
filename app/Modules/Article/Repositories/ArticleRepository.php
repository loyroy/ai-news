<?php

namespace App\Modules\Article\Repositories;

use App\Modules\Article\Models\Article;
use App\Modules\Base\Repositories\BaseRepository;

class ArticleRepository extends BaseRepository
{
    protected string $model = Article::class;
}

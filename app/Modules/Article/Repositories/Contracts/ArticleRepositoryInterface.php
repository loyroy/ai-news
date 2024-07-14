<?php

namespace App\Modules\Article\Repositories\Contracts;

use App\Modules\Article\Enums\ArticleLocation;
use App\Modules\Article\Models\Article;
use App\Modules\Base\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Support\Collection;

interface ArticleRepositoryInterface extends BaseRepositoryInterface
{
    public function getArticles(?ArticleLocation $articleLocation = null, ?int $offset = null): Collection;

    public function getFrontPageArticle(): Article;
}

<?php

namespace App\Modules\Article\Repositories\Contracts;

use App\Modules\Article\Models\Article;
use App\Modules\Base\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Support\Collection;

interface ArticleRepositoryInterface extends BaseRepositoryInterface
{
    public function getArticles(?int $offset = null, ?int $limit = null): Collection;

    public function getFrontPageArticle(): Article;

    public function findByUuid(string $uuid): ?Article;

    public function update(string $uuid, array $values): void;
}

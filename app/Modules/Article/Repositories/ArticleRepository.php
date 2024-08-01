<?php

namespace App\Modules\Article\Repositories;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Base\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    protected ?string $model = Article::class;

    public function getArticles(?int $offset = null, ?int $limit = null): Collection
    {
        $qb = $this->getQueryBuilder();

        $qb->whereNotNull('published_at')
            ->whereNull('deleted_at')
            ->orderBy('published_at', 'DESC');

        if($offset) {
            $qb->offset($offset);
        }

        if($limit) {
            $qb->limit($limit);
        }

        return $qb->get();
    }

    public function getFrontPageArticle(): Article
    {
        return $this->getQueryBuilder()
            ->whereNotNull('published_at')
            ->whereNull('deleted_at')
            ->orderBy('published_at', 'DESC')
            ->first();
    }
}

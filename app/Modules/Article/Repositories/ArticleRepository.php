<?php

namespace App\Modules\Article\Repositories;

use App\Modules\Article\Enums\ArticleLocation;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Base\Repositories\BaseRepository;
use Illuminate\Support\Collection;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    protected ?string $model = Article::class;

    public function getArticles(?ArticleLocation $articleLocation = null, ?int $offset = null): Collection
    {
        $qb = $this->getQueryBuilder();

        if($articleLocation) {
            $qb->where('location', $articleLocation->value);
        }

        if($offset) {
            $qb->offset($offset);
        }

        $qb->whereNotNull('published_at')
            ->whereNull('deleted_at')
            ->orderBy('published_at', 'DESC');

        return $qb->get();
    }

    public function getFrontPageArticle(): Article
    {
        return $this->getQueryBuilder()
            ->where('location', ArticleLocation::NONE->value)
            ->whereNotNull('published_at')
            ->whereNull('deleted_at')
            ->orderBy('published_at', 'DESC')
            ->first();
    }
}

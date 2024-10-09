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

        if($offset !== null & $limit) {
            $qb->offset($offset);
            $qb->limit($limit);
        }

        $qb->orderBy('published_at', 'DESC');

        return $qb->get();
    }

    public function getFrontPageArticle(): Article
    {
        return $this->getQueryBuilder()
            ->orderBy('published_at', 'DESC')
            ->first();
    }

    public function findByUuid(string $uuid): ?Article
    {
        return $this->getQueryBuilder()
            ->where('uuid', $uuid)
            ->first();
    }

    public function update(string $uuid, array $values): void
    {
        $this->findByUuid($uuid)
            ->update($values);
    }

    protected function addFilterQuery($queryBuilder): void
    {
        parent::addFilterQuery($queryBuilder);

        $queryBuilder
            ->whereNotNull('published_at');
    }
}

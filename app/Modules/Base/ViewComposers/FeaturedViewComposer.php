<?php

namespace App\Modules\Base\ViewComposers;

use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use Illuminate\View\View;

class FeaturedViewComposer
{
    private const FEATURED_ARTICLE_OFFSET = 5;
    private const FEATURED_ARTICLE_LIMIT = 6;

    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly ArticleTransformerInterface $articleTransformer,
    )
    {
    }

    public function compose(View $view): void
    {
        $articles = $this->articleRepository->getArticles(self::FEATURED_ARTICLE_OFFSET, self::FEATURED_ARTICLE_LIMIT);

        $view->with([
            'featuredArticles' => $this->articleTransformer->transformMany($articles),
        ]);
    }
}

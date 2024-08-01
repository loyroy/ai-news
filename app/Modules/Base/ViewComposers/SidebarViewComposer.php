<?php

namespace App\Modules\Base\ViewComposers;

use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use Illuminate\View\View;

class SidebarViewComposer
{
    private const SIDEBAR_ARTICLE_OFFSET = 1;
    private const SIDEBAR_ARTICLE_LIMIT = 4;

    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly ArticleTransformerInterface $articleTransformer,
    )
    {
    }

    public function compose(View $view): void
    {
        $articles = $this->articleRepository->getArticles(self::SIDEBAR_ARTICLE_OFFSET, self::SIDEBAR_ARTICLE_LIMIT);

        $view->with([
            'sidebarArticles' => $this->articleTransformer->transformMany($articles),
        ]);
    }
}

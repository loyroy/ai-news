<?php

namespace App\Modules\Base\ViewComposers;

use App\Modules\Article\Enums\ArticleLocation;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeaturedViewComposer
{
    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly ArticleTransformerInterface $articleTransformer,
        private readonly Request $request,
    )
    {
    }

    public function compose(View $view): void
    {
        $offset = $this->request->routeIs('home') ? 1 : 0;
        $articles = $this->articleRepository->getArticles(ArticleLocation::FEATURED, $offset)->take(3);

        $view->with([
            'featuredArticles' => $this->articleTransformer->transformMany($articles),
        ]);
    }
}

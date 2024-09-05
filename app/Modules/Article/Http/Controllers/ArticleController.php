<?php

namespace App\Modules\Article\Http\Controllers;

use App\Modules\Article\Http\Controllers\Contracts\ArticleControllerInterface;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Article\ViewModels\Contracts\ArticleViewModelInterface;

class ArticleController implements ArticleControllerInterface
{
    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly ArticleViewModelInterface $articleViewModel,
    )
    {
    }

    public function show(string $uuid): ArticleViewModelInterface
    {
        if(!$article = $this->articleRepository->findByUuid($uuid)) {
            abort(404);
        }

        $this->articleViewModel->setArticle($article);

        return $this->articleViewModel;
    }
}

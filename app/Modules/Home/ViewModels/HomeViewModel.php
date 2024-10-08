<?php

namespace App\Modules\Home\ViewModels;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use App\Modules\Base\ViewModels\BaseViewModel;
use App\Modules\Home\ViewModels\Contracts\HomeViewModelInterface;
use Carbon\Carbon;

class HomeViewModel extends BaseViewModel implements HomeViewModelInterface
{
    protected string $view = 'home';

    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly ArticleTransformerInterface $articleTransformer,
    )
    {
    }

    public function process(): array
    {
        return [
            'homeArticle' => $this->articleTransformer->transform($this->articleRepository->getFrontPageArticle()),
        ];
    }
}

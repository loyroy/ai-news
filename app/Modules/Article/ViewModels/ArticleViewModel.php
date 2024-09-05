<?php

namespace App\Modules\Article\ViewModels;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use App\Modules\Article\ViewModels\Contracts\ArticleViewModelInterface;
use App\Modules\Base\ViewModels\BaseViewModel;

class ArticleViewModel extends BaseViewModel implements ArticleViewModelInterface
{
    protected string $view = 'article.detail';

    protected Article $article;

    public function __construct(
        private readonly ArticleTransformerInterface $articleTransformer,
    )
    {
    }

    function process(): array
    {
        return [
            'article' => $this->articleTransformer->transform($this->getArticle()),
        ];
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): void
    {
        $this->article = $article;
    }
}

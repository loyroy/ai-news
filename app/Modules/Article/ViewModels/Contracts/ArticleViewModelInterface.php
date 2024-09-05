<?php

namespace App\Modules\Article\ViewModels\Contracts;

use App\Modules\Article\Models\Article;

interface ArticleViewModelInterface
{
    function process(): array;

    public function getArticle(): ?Article;

    public function setArticle(Article $article): void;
}

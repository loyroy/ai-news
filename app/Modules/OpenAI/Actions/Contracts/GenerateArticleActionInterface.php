<?php

namespace App\Modules\OpenAI\Actions\Contracts;

use App\Modules\Article\Models\Article;

interface GenerateArticleActionInterface
{
    public function execute(): void;

    public function getGeneratedArticle(): ?Article;

    public function setGeneratedArticle(?Article $generatedArticle): void;

    public function getGeneratedImageDescription(): ?string;

    public function setGeneratedImageDescription(?string $generatedImageDescription): void;
}

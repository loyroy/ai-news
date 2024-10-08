<?php

namespace App\Modules\Article\Http\Controllers;

use App\Modules\Article\Http\Controllers\Contracts\ArticleControllerInterface;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use App\Modules\Article\ViewModels\Contracts\ArticleViewModelInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;

class ArticleController implements ArticleControllerInterface
{
    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
        private readonly ArticleTransformerInterface $articleTransformer,
        private readonly ResponseFactory $responseFactory,
    )
    {
    }

    public function index(): JsonResponse
    {
        $articles = $this->articleRepository->getArticles();
        $transformedArticles = array_map([$this->articleTransformer, 'transform'], $articles->all());

        return $this->responseFactory->json($transformedArticles);
    }
}

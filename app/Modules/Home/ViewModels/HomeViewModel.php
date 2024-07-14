<?php

namespace App\Modules\Home\ViewModels;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Base\ViewModels\BaseViewModel;
use App\Modules\Home\ViewModels\Contracts\HomeViewModelInterface;
use Carbon\Carbon;

class HomeViewModel extends BaseViewModel implements HomeViewModelInterface
{
    protected string $view = 'home';

    public function __construct(
        private readonly ArticleRepositoryInterface $articleRepository,
    )
    {
    }

    public function process(): array
    {
        return [
            'homeArticle' => $this->processArticle($this->articleRepository->getFrontPageArticle()),
        ];
    }

    /**
     * TODO: turn into transformer
     *
     * @param Article $article
     * @return array
     */
    private function processArticle(Article $article): array
    {
        return [
            'title'         => $article->title,
            'content'       => $article->content,
            'image'         => $article->image,
            'published_at'  => Carbon::make($article->published_at)->toDateTimeString(),
            'synopsis'      => trim(substr($article->content, 0, 500)) . '...',
            'subtitle'      => trim(substr($article->content, 0, 100)) . '...',
            'url'           => route('articles.show', $article->uuid),
        ];
    }
}

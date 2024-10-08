<?php

namespace App\Modules\Article;

use App\Modules\Article\Http\Controllers\ArticleController;
use App\Modules\Article\Http\Controllers\Contracts\ArticleControllerInterface;
use App\Modules\Article\Repositories\ArticleRepository;
use App\Modules\Article\Repositories\Contracts\ArticleRepositoryInterface;
use App\Modules\Article\Transformers\ArticleTransformer;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use App\Modules\Article\ViewModels\ArticleViewModel;
use App\Modules\Article\ViewModels\Contracts\ArticleViewModelInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->bindings();
        $this->routes();
    }

    private function bindings(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ArticleControllerInterface::class, ArticleController::class);
        $this->app->bind(ArticleTransformerInterface::class, ArticleTransformer::class);
    }

    private function routes(): void
    {
        Route::group(['prefix' => 'api/articles', 'middleware' => 'api', 'as' => 'articles.'], function() {
            Route::get('index', [ArticleController::class, 'index']);
        });
    }
}

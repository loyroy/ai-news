<?php

namespace App\Modules\OpenAI;

use App\Modules\OpenAI\Actions\Contracts\CreateArticleActionInterface;
use App\Modules\OpenAI\Actions\CreateArticleAction;
use App\Modules\OpenAI\Commands\CreateArticle;
use Illuminate\Support\ServiceProvider;

class OpenAIServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->commands([
            CreateArticle::class,
        ]);
    }

    public function register()
    {
        $this->app->bind(CreateArticleActionInterface::class, CreateArticleAction::class);
    }
}

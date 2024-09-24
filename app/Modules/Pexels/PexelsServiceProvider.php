<?php

namespace App\Modules\Pexels;

use App\Modules\Pexels\Actions\Contracts\FetchImageActionInterface;
use App\Modules\Pexels\Actions\FetchImageAction;
use Illuminate\Support\ServiceProvider;

class PexelsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FetchImageActionInterface::class, FetchImageAction::class);
    }
}

<?php

namespace App\Modules\Base;

use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Base\Repositories\Contracts\BaseRepositoryInterface;
use App\Modules\Base\ViewComposers\HeaderViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->bindings();
        $this->registerViewComposers();
    }

    private function bindings(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
    }

    private function registerViewComposers(): void
    {
        View::composer('layouts.includes.header', HeaderViewComposer::class);
    }
}

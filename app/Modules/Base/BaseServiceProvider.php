<?php

namespace App\Modules\Base;

use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Base\Repositories\Contracts\BaseRepositoryInterface;
use App\Modules\Base\ViewComposers\FeaturedViewComposer;
use App\Modules\Base\ViewComposers\HeaderViewComposer;
use App\Modules\Base\ViewComposers\SidebarViewComposer;
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
        View::composer('layouts.includes.featured', FeaturedViewComposer::class);
        View::composer('layouts.includes.sidebar', SidebarViewComposer::class);
    }
}

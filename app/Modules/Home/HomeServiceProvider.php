<?php

namespace App\Modules\Home;

use App\Modules\Home\Http\Controllers\HomeController;
use App\Modules\Home\ViewModels\Contracts\HomeViewModelInterface;
use App\Modules\Home\ViewModels\HomeViewModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(HomeViewModelInterface::class, HomeViewModel::class);

        $this->defineRoutes();
    }

    private function defineRoutes(): void
    {
        Route::get('/', [HomeController::class, 'home'])->name('home');
    }
}

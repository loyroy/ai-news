<?php

namespace App\Modules\Home;
use App\Modules\Home\Http\Controllers\HomeController;
use App\Modules\Home\ViewModels\Contracts\HomeViewModelInterface;
use App\Modules\Home\ViewModels\HomeViewModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class HomeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(HomeViewModelInterface::class, HomeViewModel::class);

        $this->routes();
    }

    private function routes()
    {
        Route::get('/', [HomeController::class, 'home']);
    }
}

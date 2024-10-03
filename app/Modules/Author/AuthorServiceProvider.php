<?php

namespace App\Modules\Author;

use App\Modules\Author\Repositories\AuthorRepository;
use App\Modules\Author\Repositories\Contracts\AuthorRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AuthorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
    }
}

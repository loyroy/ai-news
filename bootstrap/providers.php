<?php

use App\Modules\Article\ArticleServiceProvider;
use App\Modules\Author\AuthorServiceProvider;
use App\Modules\Base\BaseServiceProvider;
use App\Modules\Home\HomeServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    HomeServiceProvider::class,
    BaseServiceProvider::class,
    ArticleServiceProvider::class,
    AuthorServiceProvider::class,
];

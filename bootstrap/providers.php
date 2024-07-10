<?php

use App\Modules\Base\BaseServiceProvider;
use App\Modules\Home\HomeServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    HomeServiceProvider::class,
    BaseServiceProvider::class,
];

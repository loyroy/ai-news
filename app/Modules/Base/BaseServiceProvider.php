<?php

namespace App\Modules\Base;

use App\Modules\Base\ViewComposers\HeaderViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        View::composer('layouts.includes.header', HeaderViewComposer::class);
    }
}

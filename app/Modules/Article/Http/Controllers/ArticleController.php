<?php

namespace App\Modules\Article\Http\Controllers;

use App\Modules\Article\Http\Controllers\Contracts\ArticleControllerInterface;

class ArticleController implements ArticleControllerInterface
{
    public function show(string $uuid)
    {
        dd('not yet implemented');
    }
}

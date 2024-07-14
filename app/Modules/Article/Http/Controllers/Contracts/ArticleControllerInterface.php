<?php

namespace App\Modules\Article\Http\Controllers\Contracts;

interface ArticleControllerInterface
{
    public function show(string $uuid);
}

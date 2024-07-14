<?php

namespace App\Modules\Article\Transformers\Contracts;

use App\Modules\Article\Models\Article;
use App\Modules\Base\Transformers\Contracts\Contracts\BaseTransformerInterface;

interface ArticleTransformerInterface extends BaseTransformerInterface
{
    public function transform(Article $article): array;
}

<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use App\Modules\Base\Transformers\BaseTransformer;
use Carbon\Carbon;

class ArticleTransformer extends BaseTransformer implements ArticleTransformerInterface
{
    public function transform(Article $article): array
    {
        return [
            'title'         => $article->title,
            'content'       => $article->content,
            'image'         => $article->image,
            'published_at'  => Carbon::make($article->published_at)->toRfc850String(),
            'synopsis'      => trim(substr($article->content, 0, 500)) . '...',
            'subtitle'      => trim(substr($article->content, 0, 100)) . '...',
            'url'           => route('articles.show', $article->uuid),
        ];
    }
}

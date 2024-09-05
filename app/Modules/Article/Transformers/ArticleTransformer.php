<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use App\Modules\Base\Transformers\BaseTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleTransformer extends BaseTransformer implements ArticleTransformerInterface
{
    public function __construct(
        private readonly Request $request,
    )
    {
    }

    public function transform(Article $article): array
    {
        $currentUrlUuid = $this->request->get('uuid');
        $active = $currentUrlUuid && $currentUrlUuid === $article->uuid;

        return [
            'title'         => $article->title,
            'content'       => $article->content,
            'image'         => $article->image,
            'published_at'  => Carbon::make($article->published_at)->toRfc850String(),
            'synopsis'      => trim(substr($article->content, 0, 500)) . '...',
            'subtitle'      => trim(substr($article->content, 0, 100)) . '...',
            'url'           => route('articles.show', $article->uuid),
            'active'        => $active,
        ];
    }
}

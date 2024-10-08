<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Transformers\Contracts\ArticleTransformerInterface;
use App\Modules\Base\Transformers\BaseTransformer;
use App\Modules\OpenAI\Actions\GenerateArticleAction;
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

        $synopsisWithTags = trim(substr($article->content, 0, 500)) . '...';
        $subtitleWithTags = trim(substr($article->content, 0, 100)) . '...';

        return [
            'uuid'          => $article->uuid,
            'title'         => $article->title,
            'content'       => $article->content,
            'image'         => $article->image,
            'published_at'  => Carbon::make($article->published_at)->toRfc850String(),
            'synopsis'      => $this->removeParagraphTags($synopsisWithTags),
            'subtitle'      => $this->removeParagraphTags($subtitleWithTags),
            'active'        => $active,
        ];
    }

    private function removeParagraphTags(string $input): string
    {
        $output = str_replace(GenerateArticleAction::ARTICLE_PARAGRAPH_TAG, '', $input);
        $output = str_replace('</p>', '', $output);

        return trim($output);
    }
}

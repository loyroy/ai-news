<?php

namespace App\Modules\OpenAI\Actions;

use App\Modules\Article\Models\Article;
use App\Modules\OpenAI\Actions\Contracts\CreateArticleActionInterface;
use App\Modules\OpenAI\Models\ParsedOpenAIResponseModel;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Responses\Chat\CreateResponseChoice;

class CreateArticleAction implements CreateArticleActionInterface
{
    public const ARTICLE_PARAGRAPH_TAG = "<p class='article-paragraph'>";
    private const TITLE_SEPARATOR = '&&&';
    private const PARAGRAPH_SEPARATOR = '===';
    private const IMAGE_DESCRIPTION_SEPARATOR = '^^^';
    private const SATIRICAL_ARTICLE_PROMPT = "Please generate a satirical and slightly absurdist news article for me. Surround the title with ‘" . self::TITLE_SEPARATOR . "’, and surround each paragraph with '" . self::PARAGRAPH_SEPARATOR . "'. Please also include one realistic but very short and simple (8 words maximum) description of a generic image that would go with this article at the end, and surround that description with ‘" . self::IMAGE_DESCRIPTION_SEPARATOR . "’. This description should be generic and real enough that when using this description as a search query for stock images, a relevant image will be the first result.";

    public function execute(): void
    {
        $rawResponse = $this->getResponse();
        $parsedResponse = $this->parseResponse($rawResponse);

        Article::factory()->create([
            'title' => $parsedResponse->getTitle(),
            'content' => $parsedResponse->getContent(),
        ]);
    }

    private function getResponse(): string
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => self::SATIRICAL_ARTICLE_PROMPT,
                ],
            ],
        ]);

        /** @var CreateResponseChoice $createResponseChoice */
        $createResponseChoice = $result->choices[0];

        return $createResponseChoice->message->content;
    }

    private function parseResponse(string $rawResponse): ParsedOpenAIResponseModel
    {
        $title = explode(self::TITLE_SEPARATOR, $rawResponse)[1];


        $content = $this->parseContent($rawResponse);
        $imageDescription = explode(self::IMAGE_DESCRIPTION_SEPARATOR, $rawResponse)[1];

        $parsedResponseModel = new ParsedOpenAIResponseModel();
        $parsedResponseModel->setTitle($title);
        $parsedResponseModel->setContent($content);
        $parsedResponseModel->setImageDescription($imageDescription);

        return $parsedResponseModel;
    }

    private function parseContent(string $rawResponse): string
    {
        $rawResponse = str_replace(PHP_EOL,'', $rawResponse);
        $paragraphs = explode(self::PARAGRAPH_SEPARATOR, $rawResponse);
        $content = '';

        foreach ($paragraphs as $paragraph) {
            if(
                empty($paragraph)
                || str_contains($paragraph, self::IMAGE_DESCRIPTION_SEPARATOR)
                || str_contains($paragraph, self::TITLE_SEPARATOR)
            ) {
                continue;
            }

            $content .= self::ARTICLE_PARAGRAPH_TAG . trim($paragraph) . '</p>';
        }

        return $content;
    }
}

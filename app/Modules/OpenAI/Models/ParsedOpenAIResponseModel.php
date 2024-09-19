<?php

namespace App\Modules\OpenAI\Models;

class ParsedOpenAIResponseModel
{
    private string $title;

    private string $content;

    private string $imageDescription;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getImageDescription(): string
    {
        return $this->imageDescription;
    }

    public function setImageDescription(string $imageDescription): void
    {
        $this->imageDescription = $imageDescription;
    }
}

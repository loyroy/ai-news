<?php

namespace App\Modules\Pexels\Actions\Contracts;

interface FetchImageActionInterface
{
    public function execute(string $searchQuery): string;
}

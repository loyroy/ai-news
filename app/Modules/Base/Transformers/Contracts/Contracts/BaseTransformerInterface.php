<?php

namespace App\Modules\Base\Transformers\Contracts\Contracts;

use Illuminate\Support\Collection;

interface BaseTransformerInterface
{
    function transformMany(array|Collection $items): array;
}

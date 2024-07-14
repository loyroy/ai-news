<?php

namespace App\Modules\Base\Transformers;

use App\Modules\Base\Transformers\Contracts\Contracts\BaseTransformerInterface;
use Illuminate\Support\Collection;

abstract class BaseTransformer implements BaseTransformerInterface
{
    public function transformMany(array|Collection $items): array
    {
        $result = [];

        foreach ($items as $item){
            $result[] = $this->transform($item);
        }

        return $result;
    }
}

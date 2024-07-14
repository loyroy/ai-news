<?php

namespace App\Modules\Article\Enums;

use App\Modules\Home\Traits\EnumTrait;

enum ArticleLocation: string
{
    use EnumTrait;
    case NONE = 'NONE';
    case FEATURED = 'FEATURED';
    case SIDEBAR = 'SIDEBAR';
}

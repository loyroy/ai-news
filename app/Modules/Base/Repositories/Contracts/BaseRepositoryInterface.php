<?php

namespace App\Modules\Base\Repositories\Contracts;

use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function all(): Collection;
}

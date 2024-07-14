<?php

namespace App\Modules\Base\Repositories;

use App\Modules\Base\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected ?string $model = null;

    public function all(): Collection
    {
        return $this->getQueryBuilder()->get();
    }

    /**
     * @throws BindingResolutionException
     */
    protected function getQueryBuilder(): Model
    {
        if(!$this->model) {
            throw new \Exception('property $model not set.');
        }

        return app()->make($this->getModel());
    }

    public function getModel(): ?string
    {
        return $this->model;
    }
}

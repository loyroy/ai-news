<?php

namespace App\Modules\Base\Repositories;

use App\Modules\Base\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

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
    protected function getQueryBuilder(): Builder
    {
        if(!$this->getModel()) {
            throw new \Exception('property $model not set.');
        }

        return app()->make($this->getModel())->newModelQuery();
    }

    private function getModel(): ?string
    {
        return $this->model;
    }
}

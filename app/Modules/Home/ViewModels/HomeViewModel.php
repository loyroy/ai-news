<?php

namespace App\Modules\Home\ViewModels;

use App\Modules\Base\ViewModels\BaseViewModel;
use App\Modules\Home\ViewModels\Contracts\HomeViewModelInterface;

class HomeViewModel extends BaseViewModel implements HomeViewModelInterface
{
    protected string $view = 'index';

    public function process(): array
    {
        return [];
    }
}

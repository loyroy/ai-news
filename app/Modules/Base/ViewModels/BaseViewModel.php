<?php

namespace App\Modules\Base\ViewModels;

use Spatie\ViewModels\ViewModel;

abstract class BaseViewModel
{
    protected string $view;
    abstract function process(): array;

    public function __toString(): string
    {
        return view($this->view, $this->process())->__toString();
    }
}

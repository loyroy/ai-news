<?php

namespace App\Modules\Home\Http\Controllers;
use App\Modules\Home\ViewModels\Contracts\HomeViewModelInterface;

class HomeController
{
    public function __construct(
        private readonly HomeViewModelInterface $homeViewModel
    )
    {

    }

    public function home(): HomeViewModelInterface
    {
        return $this->homeViewModel;
    }
}

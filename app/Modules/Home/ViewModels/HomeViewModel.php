<?php

namespace App\Modules\Home\ViewModels;

use App\Modules\Base\ViewModels\BaseViewModel;
use App\Modules\Home\ViewModels\Contracts\HomeViewModelInterface;

class HomeViewModel extends BaseViewModel implements HomeViewModelInterface
{
    protected string $view = 'home';

    public function process(): array
    {
        return [
            'homeArticle' => $this->getHomeArticle(),
        ];
    }

    private function getHomeArticle(): array
    {
        return [
            'title'     => 'Welcome to AI News!',
            'link'      => '#',
            'image'     => 'images/pic07.jpg',
            'subtitle'  => 'Fusce quis tortor. Consectetuer adipiscing elit. Nam pede erat, porta eu.',
            'synopsis'  => 'Sed etiam vestibulum velit, euismod lacinia quam nisl id lorem. Quisque erat. Vestibulum
            pellentesque, justo mollis pretium suscipit, justo nulla blandit libero, in blandit augue
            justo quis nisl. Fusce mattis viverra elit. Fusce quis tortor. Consectetuer adipiscing elit.
            Nam pede erat, porta eu, lobortis eget lorem ipsum dolor.',
        ];
    }
}

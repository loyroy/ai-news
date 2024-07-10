<?php

namespace App\Modules\Base\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderViewComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        private readonly Request $request,
    ) {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with([
            'links'     => $this->getLinks(),
            'title'     => env('APP_NAME'),
            'subtitle'  => 'Design by TEMPLATED',
        ]);
    }

    private function getLinks(): array
    {
        return [
            [
                'url' => $this->request->route('home'),
                'name' => 'Home',
                'active' => $this->request->routeIs('home'),
            ],
        ];
    }
}

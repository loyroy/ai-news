<?php

namespace App\Modules\Pexels\Actions;

use App\Modules\Pexels\Actions\Contracts\FetchImageActionInterface;
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Request\SearchPhotosRequest;

class FetchImageAction implements FetchImageActionInterface
{
    public function execute(string $searchQuery): string
    {
        $provider = new ApiProvider(env('PEXELS_API_KEY'));

        $request = new SearchPhotosRequest();
        $request->setQuery($searchQuery);
        $request->setOrientation("landscape");
        $request->setSize("large");

        $response = $provider->sendRequest($request);

        /** @var Photo $photo */
        $photo = $response->getPhotos()[0];

        return $photo->getSrc()->getLandscape();
    }
}

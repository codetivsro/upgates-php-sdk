<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Languages\ListLanguagesRequest;
use Saloon\Http\BaseResource;

final class LanguagesResource extends BaseResource
{
    public function list(): array
    {
        $request = new ListLanguagesRequest();

        return $this->connector->send($request)->array('languages', []);
    }
}

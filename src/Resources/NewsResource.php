<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\News\ListNewsRequest;
use Saloon\Http\BaseResource;

final class NewsResource extends BaseResource
{
    public function list(
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?string $language = null,
    ): iterable {
        $request = new ListNewsRequest(
            $creationTimeFrom,
            $lastUpdateTimeFrom,
            $active,
            $language
        );

        return $this->connector->paginate($request)->items();
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Advisor\ListAdvisorRequest;
use Saloon\Http\BaseResource;

final class AdvisorResource extends BaseResource
{
    public function list(
        ?int $id = null,
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?string $language = null,
    ): iterable {
        $request = new ListAdvisorRequest(
            $id,
            $creationTimeFrom,
            $lastUpdateTimeFrom,
            $active,
            $language
        );

        return $this->connector->paginate($request)->items();
    }
}

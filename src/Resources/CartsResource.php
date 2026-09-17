<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Carts\GetCartRequest;
use Codetiv\Upgates\Sdk\Requests\Carts\ListCartsRequest;
use Saloon\Http\BaseResource;

final class CartsResource extends BaseResource
{
    public function list(
        ?string $creationTimeFrom = null,
        ?string $language = null,
        ?bool $filledDeliveryInfo = null,
        ?bool $customerLoggedIn = null
    ): iterable {
        $request = new ListCartsRequest(
            $creationTimeFrom,
            $language,
            $filledDeliveryInfo,
            $customerLoggedIn
        );

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetCartRequest($id);

        return $this->connector->send($request)->array('carts', []);
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Shipments;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListShipmentGroupsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/shipments/groups';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('groups', []);
    }
}

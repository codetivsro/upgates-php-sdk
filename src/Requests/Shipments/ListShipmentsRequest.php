<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Shipments;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\ShipmentType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListShipmentsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $codes = null,
        protected ?ShipmentType $type = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/shipments';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('shipments', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'codes' => $this->codes,
            'type' => $this->type?->value,
        ];
    }
}

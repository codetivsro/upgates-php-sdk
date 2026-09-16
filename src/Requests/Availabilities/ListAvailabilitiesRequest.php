<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Availabilities;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\AvailabilityType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListAvailabilitiesRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?AvailabilityType $type = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/availabilities';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('availabilities', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'type' => $this->type?->value,
        ];
    }
}

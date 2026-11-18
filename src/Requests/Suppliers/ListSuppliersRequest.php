<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Suppliers;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListSuppliersRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?string $name = null,
        protected ?string $creationTimeFrom = null,
        protected ?string $lastUpdateTimeFrom = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/suppliers';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('suppliers', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'name' => $this->name,
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\CustomerGroups;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListCustomerGroupsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $name = null,
        protected ?array $ids = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/groups';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('groups', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'name' => $this->name,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
        ];
    }
}

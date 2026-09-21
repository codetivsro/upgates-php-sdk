<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Files;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListFilesCategoriesRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $id = null,
        protected ?array $ids = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/files/categories';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('categories', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'id' => $this->id,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
        ];
    }
}

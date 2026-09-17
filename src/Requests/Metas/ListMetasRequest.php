<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Metas;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\MetaCategory;
use Codetiv\Upgates\Sdk\Enums\MetaType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListMetasRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $key = null,
        protected ?MetaCategory $category = null,
        protected ?MetaType $type = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/metas';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('metas', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'key' => $this->key,
            'category' => $this->category?->value,
            'type' => $this->type?->value,
        ];
    }
}

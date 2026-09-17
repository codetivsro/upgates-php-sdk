<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Parameters;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListParametersValuesRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?array $attributeIds = null,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/parameters/values';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('values', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'attribute_ids' => $this->attributeIds ? implode(';', $this->attributeIds) : null,
            'language' => $this->language,
        ];
    }
}

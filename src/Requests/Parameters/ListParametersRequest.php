<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Parameters;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListParametersRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?bool $withoutValues = null,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/parameters';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('parameters', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'without_values_yn' => $this->withoutValues,
            'language' => $this->language,
        ];
    }
}

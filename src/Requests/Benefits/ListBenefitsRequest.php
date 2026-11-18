<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Benefits;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListBenefitsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?bool $active = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/benefits';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('benefits', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'active_yn' => $this->active,
        ];
    }
}

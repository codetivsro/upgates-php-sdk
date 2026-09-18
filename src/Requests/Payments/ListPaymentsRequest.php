<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Payments;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListPaymentsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?string $code = null,
        protected ?array $codes = null,
        protected ?string $type = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/payments';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('payments', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'code' => $this->code,
            'codes' => $this->codes ? implode(';', $this->codes) : null,
            'type' => $this->type,
        ];
    }
}

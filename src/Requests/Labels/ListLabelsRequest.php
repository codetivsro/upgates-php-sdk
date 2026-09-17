<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Labels;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\LabelType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListLabelsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?LabelType $type = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/labels';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('labels', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'type' => $this->type?->value,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Files;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListFilesResource extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?string $type = null,
        protected ?int $categoryId = null,
        protected ?bool $deleted = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/files';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('files', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'type' => $this->type,
            'category_id' => $this->categoryId,
            'deleted_yn' => $this->deleted,
        ];
    }
}

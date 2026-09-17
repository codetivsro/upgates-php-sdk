<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Categories;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListCategoriesRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $creationTimeFrom = null,
        protected ?string $lastUpdateTimeFrom = null,
        protected ?array $codes = null,
        protected ?int $categoryId = null,
        protected ?array $ids = null,
        protected ?int $parentId = null,
        protected ?bool $active = null,
        protected ?bool $excludeFromSearch = null,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/categories';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('categories', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
            'codes' => $this->codes ? implode(';', $this->codes) : null,
            'category_id' => $this->categoryId,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'parent_id' => $this->parentId,
            'active_yn' => $this->active,
            'exclude_from_search_yn' => $this->excludeFromSearch,
            'language' => $this->language,
        ];
    }
}

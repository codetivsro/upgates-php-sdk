<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListProductsLabelsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $codes = null,
        protected ?string $id = null,
        protected ?array $ids = null,
        protected ?array $variantCodes = null,
        protected ?string $lastUpdateTimeFrom = null,
        protected ?bool $active = null,
        protected ?bool $archived = null,
        protected ?bool $canAddToBasket = null,
        protected ?bool $excludeFromSearch = null,
        protected ?bool $inStock = null,
        protected ?string $language = null,
        protected ?array $languages = null,
        protected ?bool $variants = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/labels';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('products', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'codes' => $this->codes ? implode(';', $this->codes) : null,
            'product_id' => $this->id,
            'product_ids' => $this->ids ? implode(';', $this->ids) : null,
            'variant_codes' => $this->variantCodes ? implode(';', $this->variantCodes) : null,
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
            'active_yn' => $this->active,
            'archived_yn' => $this->archived,
            'can_add_to_basket_yn' => $this->canAddToBasket,
            'exclude_from_search_yn' => $this->excludeFromSearch,
            'in_stock_yn' => $this->inStock,
            'language' => $this->language,
            'languages' => $this->languages ? implode(';', $this->languages) : null,
            'variants_yn' => $this->variants,
        ];
    }
}

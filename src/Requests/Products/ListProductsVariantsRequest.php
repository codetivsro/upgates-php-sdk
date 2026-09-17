<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListProductsVariantsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $codes = null,
        protected ?string $id = null,
        protected ?array $ids = null,
        protected ?array $variantCodes = null,
        protected ?bool $active = null,
        protected ?bool $canAddToBasket = null,
        protected ?bool $inStock = null,
        protected ?string $language = null,
        protected ?array $languages = null,
        protected ?string $pricelist = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/variants';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('variants', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'codes' => $this->codes ? implode(';', $this->codes) : null,
            'product_id' => $this->id,
            'product_ids' => $this->ids ? implode(';', $this->ids) : null,
            'variant_codes' => $this->variantCodes ? implode(';', $this->variantCodes) : null,
            'active_yn' => $this->active,
            'can_add_to_basket_yn' => $this->canAddToBasket,
            'in_stock_yn' => $this->inStock,
            'language' => $this->language,
            'languages' => $this->languages ? implode(';', $this->languages) : null,
            'pricelist' => $this->pricelist,
        ];
    }
}

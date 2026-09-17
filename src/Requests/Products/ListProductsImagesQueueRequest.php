<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListProductsImagesQueueRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $code = null,
        protected ?array $codes = null,
        protected ?string $id = null,
        protected ?array $ids = null,
        protected ?array $variantCodes = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/images-queue';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('images_queue', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'code' => $this->code,
            'codes' => $this->codes ? implode(';', $this->codes) : null,
            'product_id' => $this->id,
            'product_ids' => $this->ids ? implode(';', $this->ids) : null,
            'variant_codes' => $this->variantCodes ? implode(';', $this->variantCodes) : null,
        ];
    }
}

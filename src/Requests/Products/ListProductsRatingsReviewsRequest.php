<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListProductsRatingsReviewsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $productCode = null,
        protected ?string $customerEmail = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/ratings-reviews';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('ratings_reviews', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'product_code' => $this->productCode,
            'email' => $this->customerEmail,
        ];
    }
}

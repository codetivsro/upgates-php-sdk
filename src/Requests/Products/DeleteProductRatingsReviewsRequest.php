<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteProductRatingsReviewsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ?int $id = null,
        protected ?array $ids = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/ratings-reviews';
    }

    protected function defaultQuery(): array
    {
        return [
            'rating_review_id' => $this->id,
            'rating_review_ids' => $this->ids ? implode(';', $this->ids) : null,
        ];
    }
}

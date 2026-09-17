<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateProductRatingReviewRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $productCode,
        protected string $customerEmail,
        protected int $ratingScore,
        protected ?array $reviewData = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/ratings-reviews';
    }

    protected function defaultBody(): array
    {
        $data = [
            'product' => [
                'code' => $this->productCode,
            ],
            'customer' => [
                'email' => $this->customerEmail,
            ],
            'rating' => [
                'score' => $this->ratingScore,
            ],
        ];

        if ($this->reviewData) {
            $data['review'] = $this->reviewData;
        }

        return [
            'ratings_reviews' => [
                $data,
            ],
        ];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}

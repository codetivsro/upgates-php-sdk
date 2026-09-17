<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateProductsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products';
    }

    protected function defaultBody(): array
    {
        return [
            'products' => $this->data,
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

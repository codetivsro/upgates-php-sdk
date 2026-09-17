<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteProductsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ?string $code = null,
        protected ?array $codes = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products';
    }

    protected function defaultQuery(): array
    {
        return [
            'code' => $this->code,
            'codes' => $this->codes ? implode(';', $this->codes) : null,
        ];
    }
}

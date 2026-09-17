<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteProductVariantsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $codes,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/variants';
    }

    protected function defaultQuery(): array
    {
        return [
            'codes' => implode(';', $this->codes),
        ];
    }
}

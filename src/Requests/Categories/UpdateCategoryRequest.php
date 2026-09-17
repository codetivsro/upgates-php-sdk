<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Categories;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateCategoryRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int|string $idOrCode,
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/categories';
    }

    protected function defaultBody(): array
    {
        return [
            'categories' => [
                [
                    ...(is_int($this->idOrCode) ? ['category_id' => $this->idOrCode] : ['code' => $this->idOrCode]),
                    ...$this->data,
                ],
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

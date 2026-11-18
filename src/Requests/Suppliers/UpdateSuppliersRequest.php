<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Suppliers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateSuppliersRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/suppliers';
    }

    protected function defaultBody(): array
    {
        return [
            'suppliers' => $this->data,
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

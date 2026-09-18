<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteCustomersRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ?int $id = null,
        protected ?array $ids = null,
        protected ?string $email = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/customers';
    }

    protected function defaultQuery(): array
    {
        return [
            'id' => $this->id,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'email' => $this->email,
        ];
    }
}

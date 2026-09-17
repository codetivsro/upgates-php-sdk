<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Orders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteOrdersRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ?string $number = null,
        protected ?array $numbers = null,
        protected ?bool $completeDelete = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/orders';
    }

    protected function defaultQuery(): array
    {
        return [
            'order_number' => $this->number,
            'order_numbers' => $this->numbers ? implode(';', $this->numbers) : null,
            'complete_delete_yn' => $this->completeDelete,
        ];
    }
}

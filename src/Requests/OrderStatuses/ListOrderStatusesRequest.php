<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\OrderStatuses;

use Codetiv\Upgates\Sdk\Enums\OrderStatusType;
use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListOrderStatusesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?OrderStatusType $type = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/order-statuses';
    }

    protected function defaultQuery(): array
    {
        return [
            'type' => $this->type?->value,
        ];
    }
}

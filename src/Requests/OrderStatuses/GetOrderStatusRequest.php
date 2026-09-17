<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\OrderStatuses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetOrderStatusRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/order-statuses/' . $this->id;
    }
}

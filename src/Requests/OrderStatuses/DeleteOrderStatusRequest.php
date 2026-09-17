<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\OrderStatuses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteOrderStatusRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/order-statuses/' . $this->id;
    }
}

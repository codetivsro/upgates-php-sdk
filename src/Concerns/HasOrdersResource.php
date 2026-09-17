<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\OrdersResource;

trait HasOrdersResource
{
    public function orders(): OrdersResource
    {
        return new OrdersResource($this);
    }
}

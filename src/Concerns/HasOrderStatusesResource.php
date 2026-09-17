<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\OrderStatusesResource;

trait HasOrderStatusesResource
{
    public function orderStatuses(): OrderStatusesResource
    {
        return new OrderStatusesResource($this);
    }
}

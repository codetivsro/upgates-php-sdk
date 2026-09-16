<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\ShipmentsResource;

trait HasShipmentsResource
{
    public function shipments(): ShipmentsResource
    {
        return new ShipmentsResource($this);
    }
}

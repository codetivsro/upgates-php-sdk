<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\CartsResource;

trait HasCartsResource
{
    public function carts(): CartsResource
    {
        return new CartsResource($this);
    }
}

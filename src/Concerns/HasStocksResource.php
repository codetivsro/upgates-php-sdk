<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\StocksResource;

trait HasStocksResource
{
    public function stocks(): StocksResource
    {
        return new StocksResource($this);
    }
}

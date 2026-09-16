<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\PriceListsResource;

trait HasPriceListsResource
{
    public function priceLists(): PriceListsResource
    {
        return new PriceListsResource($this);
    }
}

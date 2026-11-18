<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\PriceFormulasResource;

trait HasPriceFormulasResource
{
    public function priceFormulas(): PriceFormulasResource
    {
        return new PriceFormulasResource($this);
    }
}

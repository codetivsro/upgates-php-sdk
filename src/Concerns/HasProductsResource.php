<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\ProductsResource;

trait HasProductsResource
{
    public function products(): ProductsResource
    {
        return new ProductsResource($this);
    }
}

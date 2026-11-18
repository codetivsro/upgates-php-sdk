<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\SuppliersResource;

trait HasSuppliersResource
{
    public function suppliers(): SuppliersResource
    {
        return new SuppliersResource($this);
    }
}

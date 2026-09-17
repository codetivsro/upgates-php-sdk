<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\ManufacturersResource;

trait HasManufacturersResource
{
    public function manufacturers(): ManufacturersResource
    {
        return new ManufacturersResource($this);
    }
}

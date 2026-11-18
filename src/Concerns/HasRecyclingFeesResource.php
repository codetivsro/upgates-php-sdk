<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\RecyclingFeesResource;

trait HasRecyclingFeesResource
{
    public function recyclingFees(): RecyclingFeesResource
    {
        return new RecyclingFeesResource($this);
    }
}

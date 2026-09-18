<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\AdvisorResource;

trait HasAdvisorResource
{
    public function advisor(): AdvisorResource
    {
        return new AdvisorResource($this);
    }
}

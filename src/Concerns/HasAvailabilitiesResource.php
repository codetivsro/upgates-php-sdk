<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\AvailabilitiesResource;

trait HasAvailabilitiesResource
{
    public function availabilities(): AvailabilitiesResource
    {
        return new AvailabilitiesResource($this);
    }
}

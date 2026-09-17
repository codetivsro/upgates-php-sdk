<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\ParametersResource;

trait HasParametersResource
{
    public function parameters(): ParametersResource
    {
        return new ParametersResource($this);
    }
}

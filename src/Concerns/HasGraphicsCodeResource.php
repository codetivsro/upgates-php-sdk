<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\GraphicsCodeResource;

trait HasGraphicsCodeResource
{
    public function graphicsCode(): GraphicsCodeResource
    {
        return new GraphicsCodeResource($this);
    }
}

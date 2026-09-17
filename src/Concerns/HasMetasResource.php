<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\MetasResource;

trait HasMetasResource
{
    public function metas(): MetasResource
    {
        return new MetasResource($this);
    }
}

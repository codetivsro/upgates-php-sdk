<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\NewsResource;

trait HasNewsResource
{
    public function news(): NewsResource
    {
        return new NewsResource($this);
    }
}

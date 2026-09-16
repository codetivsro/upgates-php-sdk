<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\LanguagesResource;

trait HasLanguagesResource
{
    public function languages(): LanguagesResource
    {
        return new LanguagesResource($this);
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\RedirectionsResource;

trait HasRedirectionsResource
{
    public function redirections(): RedirectionsResource
    {
        return new RedirectionsResource($this);
    }
}

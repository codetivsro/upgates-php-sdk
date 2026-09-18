<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\UsersResource;

trait HasUsersResource
{
    public function users(): UsersResource
    {
        return new UsersResource($this);
    }
}

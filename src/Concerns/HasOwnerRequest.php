<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Requests\GetOwnerRequest;

trait HasOwnerRequest
{
    public function owner(): array
    {
        return $this->send(new GetOwnerRequest())->array('owner', []);
    }
}

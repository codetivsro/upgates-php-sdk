<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Requests\GetStatusRequest;

trait HasStatusRequest
{
    public function status(): array
    {
        return $this->send(new GetStatusRequest())->array();
    }
}

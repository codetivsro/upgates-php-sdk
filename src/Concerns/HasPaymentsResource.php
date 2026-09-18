<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\PaymentsResource;

trait HasPaymentsResource
{
    public function payments(): PaymentsResource
    {
        return new PaymentsResource($this);
    }
}

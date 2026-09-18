<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\VouchersResource;

trait HasVouchersResource
{
    public function vouchers(): VouchersResource
    {
        return new VouchersResource($this);
    }
}

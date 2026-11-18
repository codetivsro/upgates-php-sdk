<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\VoucherTemplatesResource;

trait HasVoucherTemplatesResource
{
    public function voucherTemplates(): VoucherTemplatesResource
    {
        return new VoucherTemplatesResource($this);
    }
}

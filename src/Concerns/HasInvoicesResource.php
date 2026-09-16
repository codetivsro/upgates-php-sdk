<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\InvoicesResource;

trait HasInvoicesResource
{
    public function invoices(): InvoicesResource
    {
        return new InvoicesResource($this);
    }
}

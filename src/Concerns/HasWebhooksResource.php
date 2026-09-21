<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\WebhooksResource;

trait HasWebhooksResource
{
    public function webhooks(): WebhooksResource
    {
        return new WebhooksResource($this);
    }
}

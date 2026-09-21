<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListWebhooksEventsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/webhooks/events';
    }
}

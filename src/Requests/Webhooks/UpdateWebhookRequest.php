<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Webhooks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateWebhookRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $id,
        protected ?bool $active = null,
        protected ?string $name = null,
        protected ?string $url = null,
        protected ?string $event = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/webhooks';
    }

    protected function defaultBody(): array
    {
        return [
            'id' => $this->id,
            'active_yn' => $this->active,
            'name' => $this->name,
            'url' => $this->url,
            'event' => $this->event,
        ];
    }
}

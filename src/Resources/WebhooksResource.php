<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Webhooks\CreateWebhookRequest;
use Codetiv\Upgates\Sdk\Requests\Webhooks\DeleteWebhooksRequest;
use Codetiv\Upgates\Sdk\Requests\Webhooks\GetWebhookRequest;
use Codetiv\Upgates\Sdk\Requests\Webhooks\ListWebhooksEventsRequest;
use Codetiv\Upgates\Sdk\Requests\Webhooks\ListWebhooksRequest;
use Codetiv\Upgates\Sdk\Requests\Webhooks\UpdateWebhookRequest;
use Saloon\Http\BaseResource;

final class WebhooksResource extends BaseResource
{
    public function list(): array
    {
        $request = new ListWebhooksRequest();

        return $this->connector->send($request)->array('webhooks', []);
    }

    public function update(
        int $id,
        ?bool $active = null,
        ?string $name = null,
        ?string $url = null,
        ?string $event = null,
    ): ?array {
        $request = new UpdateWebhookRequest($id, $active, $name, $url, $event);

        return $this->connector->send($request)->array('webhook');
    }

    public function create(string $name, string $url, string $event, ?bool $active = null): ?array
    {
        $request = new CreateWebhookRequest($name, $url, $event, $active);

        return $this->connector->send($request)->array('webhook');
    }

    public function get(int $id): array
    {
        $request = new GetWebhookRequest($id);

        return $this->connector->send($request)->array('webhooks', []);
    }

    public function delete(int... $ids): array
    {
        $request = new DeleteWebhooksRequest($ids);

        return $this->connector->send($request)->array('webhooks', []);
    }

    public function listEvents(): array
    {
        $request = new ListWebhooksEventsRequest();

        return $this->connector->send($request)->array('events', []);
    }
}

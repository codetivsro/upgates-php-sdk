<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\OrderStatusType;
use Codetiv\Upgates\Sdk\Requests\OrderStatuses\CreateOrderStatusRequest;
use Codetiv\Upgates\Sdk\Requests\OrderStatuses\DeleteOrderStatusRequest;
use Codetiv\Upgates\Sdk\Requests\OrderStatuses\GetOrderStatusRequest;
use Codetiv\Upgates\Sdk\Requests\OrderStatuses\ListOrderStatusesRequest;
use Codetiv\Upgates\Sdk\Requests\OrderStatuses\UpdateOrderStatusRequest;
use Saloon\Http\BaseResource;

final class OrderStatusesResource extends BaseResource
{
    public function list(?OrderStatusType $type = null): array
    {
        $request = new ListOrderStatusesRequest($type);

        return $this->connector->send($request)->array('order_statuses', []);
    }

    public function update(
        int $id,
        array $descriptions,
        ?string $color = null,
        ?bool $markResolved = null,
        ?bool $markPaid = null,
        ?bool $markDelivered = null,
    ): ?array {
        $request = new UpdateOrderStatusRequest(
            $id,
            $descriptions,
            $color,
            $markResolved,
            $markPaid,
            $markDelivered
        );

        return $this->connector->send($request)->array('order_status');
    }

    public function create(
        array $descriptions,
        ?string $color = null,
        ?bool $markResolved = null,
        ?bool $markPaid = null,
        ?bool $markDelivered = null,
    ): ?array {
        $request = new CreateOrderStatusRequest(
            $descriptions,
            $color,
            $markResolved,
            $markPaid,
            $markDelivered
        );

        return $this->connector->send($request)->array('order_status');
    }

    public function get(int $id): array
    {
        $request = new GetOrderStatusRequest($id);

        return $this->connector->send($request)->array('order_statuses', []);
    }

    public function delete(int $id): ?array
    {
        $request = new DeleteOrderStatusRequest($id);

        return $this->connector->send($request)->array('order_status');
    }
}

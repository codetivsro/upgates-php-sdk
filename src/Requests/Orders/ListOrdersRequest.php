<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Orders;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\PaymentType;
use Codetiv\Upgates\Sdk\Enums\ShipmentType;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListOrdersRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $orderNumbers = null,
        protected ?string $creationTimeFrom = null,
        protected ?string $creationTimeTo = null,
        protected ?string $lastUpdateTimeFrom = null,
        protected ?bool $paid = null,
        protected ?bool $delivered = null,
        protected ?bool $deleted = null,
        protected ?string $status = null,
        protected ?string $statusId = null,
        protected ?array $statusIds = null,
        protected ?string $language = null,
        protected ?string $email = null,
        protected ?string $phone = null,
        protected ?string $externalOrderNumber = null,
        protected ?PaymentType $paymentType = null,
        protected ?ShipmentType $shipmentType = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/orders';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('orders', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'order_numbers' => $this->orderNumbers ? implode(';', $this->orderNumbers) : null,
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'creation_time_to' => Helpers::convertQueryDateFormatOrNull($this->creationTimeTo),
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
            'paid_yn' => $this->paid,
            'delivered_yn' => $this->delivered,
            'deleted_yn' => $this->deleted,
            'status' => $this->status,
            'status_id' => $this->statusId,
            'status_ids' => $this->statusIds ? implode(';', $this->statusIds) : null,
            'language' => $this->language,
            'email' => $this->email,
            'phone' => $this->phone,
            'external_order_number' => $this->externalOrderNumber,
            'payment_type' => $this->paymentType?->value,
            'shipment_type' => $this->shipmentType?->value,
        ];
    }
}

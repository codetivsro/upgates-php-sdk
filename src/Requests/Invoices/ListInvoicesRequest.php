<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Invoices;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\DocumentType;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListInvoicesRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $invoiceNumbers = null,
        protected ?string $creationTimeFrom = null,
        protected ?string $creationTimeTo = null,
        protected ?string $lastUpdateTimeFrom = null,
        protected ?bool $paid = null,
        protected ?DocumentType $type = null,
        protected ?string $orderNumber = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/invoices';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('invoices', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'invoice_numbers' => $this->invoiceNumbers ? implode(';', $this->invoiceNumbers) : null,
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'creation_time_to' => Helpers::convertQueryDateFormatOrNull($this->creationTimeTo),
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
            'paid_yn' => $this->paid,
            'type' => $this->type?->value,
            'order_number' => $this->orderNumber,
        ];
    }
}

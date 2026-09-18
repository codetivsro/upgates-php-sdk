<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Customers;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListCustomersResource extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $creationTimeFrom = null,
        protected ?string $lastUpdateTimeFrom = null,
        protected ?string $code = null,
        protected ?int $id = null,
        protected ?array $ids = null,
        protected ?bool $active = null,
        protected ?bool $blocked = null,
        protected ?string $language = null,
        protected ?string $pricelist = null,
        protected ?string $email = null,
        protected ?string $phone = null,
        protected ?string $companyName = null,
        protected ?string $companyNumber = null,
        protected ?string $companyVatNumber = null,
        protected ?string $newsletterAccept = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/customers';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('customers', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
            'code' => $this->code,
            'customer_id' => $this->id,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'active_yn' => $this->active,
            'blocked_yn' => $this->blocked,
            'language' => $this->language,
            'pricelist' => $this->pricelist,
            'email' => $this->email,
            'phone' => $this->phone,
            'company_name' => $this->companyName,
            'company_number' => $this->companyNumber,
            'company_vat_number' => $this->companyVatNumber,
            'newsletter_accept' => $this->newsletterAccept,
        ];
    }
}

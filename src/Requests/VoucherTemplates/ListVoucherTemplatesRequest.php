<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\VoucherTemplates;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListVoucherTemplatesRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $name = null,
        protected ?string $currency = null,
        protected ?string $language = null,
        protected ?bool $active = null,
        protected ?string $dateFrom = null,
        protected ?string $dateTo = null,
        protected ?bool $global = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/voucher-templates';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('voucher_templates', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'name' => $this->name,
            'currency_id' => $this->currency,
            'language_id' => $this->language,
            'active_yn' => $this->active,
            'date_from' => Helpers::convertQueryDateFormatOrNull($this->dateFrom),
            'date_to' => Helpers::convertQueryDateFormatOrNull($this->dateTo),
            'global_yn' => $this->global,
        ];
    }
}

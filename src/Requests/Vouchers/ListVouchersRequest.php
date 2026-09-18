<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Vouchers;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListVouchersRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $code = null,
        protected ?array $codes = null,
        protected ?string $currency = null,
        protected ?bool $active = null,
        protected ?bool $forProductsInAction = null,
        protected ?string $dateFrom = null,
        protected ?string $dateTo = null,
        protected ?bool $global = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/vouchers';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('vouchers', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'code' => $this->code,
            'codes' => $this->codes ? implode(';', $this->codes) : null,
            'currency_id' => $this->currency,
            'active_yn' => $this->active,
            'for_products_in_action_yn' => $this->forProductsInAction,
            'date_from' => Helpers::convertQueryDateFormatOrNull($this->dateFrom),
            'date_to' => Helpers::convertQueryDateFormatOrNull($this->dateTo),
            'global_yn' => $this->global,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Vouchers;

use Codetiv\Upgates\Sdk\Enums\VoucherType;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateVoucherRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected VoucherType $type,
        protected string $currency,
        protected float $amount,
        protected ?int $count = null,
        protected ?bool $active = null,
        protected ?bool $global = null,
        protected ?bool $forProductsInAction = null,
        protected ?string $dateFrom = null,
        protected ?string $dateTo = null,
        protected ?float $usedFrom = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/vouchers';
    }

    protected function defaultBody(): array
    {
        return [
            'type' => $this->type->value,
            'currency_id' => $this->currency,
            'amount' => $this->amount,
            'count' => $this->count,
            'active_yn' => $this->active,
            'global_yn' => $this->global,
            'for_products_in_action_yn' => $this->forProductsInAction,
            'date_from' => Helpers::convertQueryDateFormatOrNull($this->dateFrom),
            'date_to' => Helpers::convertQueryDateFormatOrNull($this->dateTo),
            'used_from' => $this->usedFrom,
        ];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}

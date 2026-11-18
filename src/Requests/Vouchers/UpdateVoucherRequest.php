<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Vouchers;

use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateVoucherRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $id,
        protected ?bool $active = null,
        protected ?bool $forProductsInAction = null,
        protected ?string $dateFrom = null,
        protected ?string $dateTo = null,
        protected ?float $amount = null,
        protected ?float $usedFrom = null,
        protected ?int $maxUsageCount = null,
        protected ?int $maxUsagePerCustomer = null,
        protected ?array $categories = null,
        protected ?string $note = null,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/vouchers';
    }

    protected function defaultBody(): array
    {
        return [
            'voucher_id' => $this->id,
            'active_yn' => $this->active,
            'for_products_in_action_yn' => $this->forProductsInAction,
            'date_from' => Helpers::convertQueryDateFormatOrNull($this->dateFrom),
            'date_to' => Helpers::convertQueryDateFormatOrNull($this->dateTo),
            'amount' => $this->amount,
            'used_from' => $this->usedFrom,
            'max_usage_count' => $this->maxUsageCount,
            'max_usage_per_customer' => $this->maxUsagePerCustomer,
            'categories' => $this->categories,
            'note' => $this->note,
            'language_id' => $this->language,
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

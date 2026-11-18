<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\VoucherTemplates;

use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateVoucherTemplateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $id,
        protected ?string $name = null,
        protected ?bool $active = null,
        protected ?bool $forProductsInAction = null,
        protected ?string $dateFrom = null,
        protected ?string $dateTo = null,
        protected ?float $amount = null,
        protected ?float $usedFrom = null,
        protected ?string $language = null,
        protected ?int $maxUsageCount = null,
        protected ?int $maxUsagePerCustomer = null,
        protected ?string $note = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/voucher-templates';
    }

    protected function defaultBody(): array
    {
        return [
            'voucher_template_id' => $this->id,
            'name' => $this->name,
            'active_yn' => $this->active,
            'for_products_in_action_yn' => $this->forProductsInAction,
            'date_from' => Helpers::convertQueryDateFormatOrNull($this->dateFrom),
            'date_to' => Helpers::convertQueryDateFormatOrNull($this->dateTo),
            'amount' => $this->amount,
            'used_from' => $this->usedFrom,
            'language_id' => $this->language,
            'max_usage_count' => $this->maxUsageCount,
            'max_usage_per_customer' => $this->maxUsagePerCustomer,
            'note' => $this->note,
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

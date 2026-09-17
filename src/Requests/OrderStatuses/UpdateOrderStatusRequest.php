<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\OrderStatuses;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateOrderStatusRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $id,
        protected array $descriptions,
        protected ?string $color = null,
        protected ?bool $markResolved = null,
        protected ?bool $markPaid = null,
        protected ?bool $markDelivered = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/order-statuses';
    }

    protected function defaultBody(): array
    {
        return [
            'id' => $this->id,
            'descriptions' => $this->descriptions,
            'color' => $this->color,
            'mark_resolved_yn' => $this->markResolved,
            'mark_paid_yn' => $this->markPaid,
            'mark_delivered_yn' => $this->markDelivered,
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

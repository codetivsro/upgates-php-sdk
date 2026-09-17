<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateOrdersRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected array $data,
        protected bool $sendEmails = true,
        protected bool $sendSms = true,
        protected bool $deleteMissingProducts = false
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/orders';
    }

    protected function defaultBody(): array
    {
        return [
            'orders' => $this->data,
            'send_emails_yn' => $this->sendEmails,
            'send_sms_yn' => $this->sendSms,
            'delete_missing_products_yn' => $this->deleteMissingProducts,
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

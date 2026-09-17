<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateOrdersRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data,
        protected bool $sendEmails = true,
        protected bool $sendSms = true
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

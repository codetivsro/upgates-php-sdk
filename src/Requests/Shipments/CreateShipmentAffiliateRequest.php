<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Shipments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateShipmentAffiliateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $id,
        protected array $affiliateData
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/shipments/' . $this->id .'/affiliates';
    }

    protected function defaultBody(): array
    {
        return [
            'affiliates' => [
                $this->affiliateData,
            ],
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

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Payments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetPaymentRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/payments/' . $this->id;
    }
}

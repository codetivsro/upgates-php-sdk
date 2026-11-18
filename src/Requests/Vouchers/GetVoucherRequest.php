<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Vouchers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetVoucherRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $id,
        protected ?string $currency = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/vouchers/' . $this->id;
    }

    protected function defaultQuery(): array
    {
        return [
            'currency_id' => $this->currency,
        ];
    }
}

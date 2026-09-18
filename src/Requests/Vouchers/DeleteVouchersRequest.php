<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Vouchers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteVouchersRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ?int $code = null,
        protected ?array $codes = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/vouchers';
    }

    protected function defaultQuery(): array
    {
        return [
            'code' => $this->code,
            'codes' => $this->codes ? implode(';', $this->codes) : null,
        ];
    }
}

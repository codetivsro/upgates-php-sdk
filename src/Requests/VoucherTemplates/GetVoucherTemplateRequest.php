<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\VoucherTemplates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetVoucherTemplateRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/voucher-templates/' . $this->id;
    }
}

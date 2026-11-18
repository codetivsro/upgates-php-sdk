<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\VoucherTemplates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteVoucherTemplatesRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/voucher-templates';
    }

    protected function defaultQuery(): array
    {
        return [
            'voucher_template_ids' => implode(';', $this->ids),
        ];
    }
}

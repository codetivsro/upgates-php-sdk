<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ViewPdfInvoiceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $number
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/invoices/' . $this->number . '/pdf';
    }
}

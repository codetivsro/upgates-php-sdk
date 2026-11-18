<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\PriceFormulas;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreatePriceFormulasRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/pricing-formulas';
    }

    protected function defaultBody(): array
    {
        return [
            'pricing_formulas' => $this->data,
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

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\ConversionCodes;

use Codetiv\Upgates\Sdk\Enums\ConversionCodePosition;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateConversionCodeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ConversionCodePosition $position,
        protected string $language,
        protected string $code,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/conversion-codes';
    }

    protected function defaultBody(): array
    {
        return [
            'conversion_codes' => [
                [
                    'position' => $this->position->value,
                    'language_id' => $this->language,
                    'code' => $this->code,
                ],
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

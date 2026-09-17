<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\ConversionCodes;

use Codetiv\Upgates\Sdk\Enums\ConversionCodePosition;
use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetConversionCodeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ConversionCodePosition $position
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/conversion-codes/' . $this->position->value;
    }
}

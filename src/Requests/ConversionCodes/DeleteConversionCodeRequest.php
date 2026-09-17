<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\ConversionCodes;

use Codetiv\Upgates\Sdk\Enums\ConversionCodePosition;
use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteConversionCodeRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ConversionCodePosition $position,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/conversion-codes/' . $this->position->value;
    }

    protected function defaultQuery(): array
    {
        return [
            'language_id' => $this->language,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\ConversionCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListConversionCodesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/pricelists';
    }

    protected function defaultQuery(): array
    {
        return [
            'language_id' => $this->language,
        ];
    }
}

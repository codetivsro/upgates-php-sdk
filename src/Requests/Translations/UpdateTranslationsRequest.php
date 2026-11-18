<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Translations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateTranslationsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/translations';
    }

    protected function defaultBody(): array
    {
        return [
            'translations' => $this->data,
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

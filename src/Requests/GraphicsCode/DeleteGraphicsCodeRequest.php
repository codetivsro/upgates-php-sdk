<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\GraphicsCode;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class DeleteGraphicsCodeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::DELETE;

    public function __construct(
        protected string $path
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/graphics/code';
    }

    protected function defaultBody(): array
    {
        return [
            'pathname' => $this->path,
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

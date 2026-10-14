<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\GraphicsCode;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetGraphicsCodeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $path
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/graphics/code';
    }

    protected function defaultQuery(): array
    {
        return [
            'pathname' => $this->path,
        ];
    }
}

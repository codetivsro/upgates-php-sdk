<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\GraphicsCode;

use Codetiv\Upgates\Sdk\Enums\GraphicsCodeType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateGraphicsCodeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $path,
        protected GraphicsCodeType $type,
        protected ?string $content = null,
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
            'type' => $this->type->value,
            'content' => $this->content,
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

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\GraphicsBackups;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateGraphicsBackupRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $name
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/graphics/backups';
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
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

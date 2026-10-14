<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\GraphicsBackups;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class RestoreGraphicsBackupRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected string $token
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/graphics/backups';
    }

    protected function defaultBody(): array
    {
        return [
            'token' => $this->token,
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

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\GraphicsBackups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListGraphicsBackupsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/graphics/backups';
    }
}

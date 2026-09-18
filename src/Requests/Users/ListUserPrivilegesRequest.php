<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListUserPrivilegesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/users-privileges';
    }
}

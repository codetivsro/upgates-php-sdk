<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Languages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListLanguagesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/languages';
    }
}

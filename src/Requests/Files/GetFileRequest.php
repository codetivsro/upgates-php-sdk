<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Files;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetFileRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/files/' . $this->id;
    }
}

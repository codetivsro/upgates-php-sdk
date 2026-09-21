<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Files;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteFileRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/files/' . $this->id;
    }
}

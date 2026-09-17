<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetProductFilesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected string $code
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/' . $this->code . '/files';
    }
}

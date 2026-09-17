<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Manufacturers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetManufacturerRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/manufacturers/' . $this->id;
    }
}

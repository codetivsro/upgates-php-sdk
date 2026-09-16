<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\PriceLists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeletePriceListRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/pricelists/' . $this->id;
    }
}

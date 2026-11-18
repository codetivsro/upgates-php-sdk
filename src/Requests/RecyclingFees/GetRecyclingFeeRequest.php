<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\RecyclingFees;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetRecyclingFeeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/recycling-fees/' . $this->id;
    }
}

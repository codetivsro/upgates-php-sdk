<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\CustomerGroups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteCustomerGroupsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/groups';
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

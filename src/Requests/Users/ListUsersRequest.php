<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Users;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListUsersRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?bool $active = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/users';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('users', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'active_yn' => $this->active,
        ];
    }
}

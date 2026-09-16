<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Articles;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteArticlesRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/articles';
    }


    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

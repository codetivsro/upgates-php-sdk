<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\News;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteNewsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/news';
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

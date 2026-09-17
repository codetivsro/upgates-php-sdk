<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Categories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteCategoriesRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ?int $id = null,
        protected ?array $ids = null,
        protected ?string $code = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/categories';
    }

    protected function defaultQuery(): array
    {
        return [
            'id' => $this->id,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'code' => $this->code,
        ];
    }
}

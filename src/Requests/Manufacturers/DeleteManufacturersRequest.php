<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Manufacturers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteManufacturersRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected ?int $id = null,
        protected ?array $ids = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/manufacturers';
    }

    protected function defaultQuery(): array
    {
        return [
            'id' => $this->id,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
        ];
    }
}

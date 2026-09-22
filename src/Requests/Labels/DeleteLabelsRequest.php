<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Labels;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteLabelsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/labels';
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

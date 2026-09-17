<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Parameters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteParametersValuesRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/parameters/values';
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

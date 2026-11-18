<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Advisor;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteAdvisorRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/advisor';
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

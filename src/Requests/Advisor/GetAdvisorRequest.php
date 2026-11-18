<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Advisor;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetAdvisorRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/advisor/' . $this->id;
    }

    protected function defaultQuery(): array
    {
        return [
            'language' => $this->language,
        ];
    }
}

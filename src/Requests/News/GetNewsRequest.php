<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\News;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetNewsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/news/' . $this->id;
    }

    protected function defaultQuery(): array
    {
        return [
            'language' => $this->language,
        ];
    }
}

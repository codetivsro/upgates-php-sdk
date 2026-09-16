<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Articles;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateArticleRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected array $data
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/articles';
    }

    protected function defaultBody(): array
    {
        return [
            'articles' => [
                $this->data,
            ],
        ];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}

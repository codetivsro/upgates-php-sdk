<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\PriceLists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreatePriceListRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $name,
        protected float $percent
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/pricelists';
    }

    protected function defaultBody(): array
    {
        return [
            'pricelists' => [
                [
                    'name' => $this->name,
                    'percent' => $this->percent,
                ],
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

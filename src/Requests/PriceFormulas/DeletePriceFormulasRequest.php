<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\PriceFormulas;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeletePriceFormulasRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected array $ids
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/pricing-formulas';
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

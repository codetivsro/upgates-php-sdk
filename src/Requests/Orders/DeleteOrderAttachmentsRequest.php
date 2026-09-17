<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Orders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteOrderAttachmentsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected string $number,
        protected array $ids,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/orders/' . $this->number . '/attachments';
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => implode(';', $this->ids),
        ];
    }
}

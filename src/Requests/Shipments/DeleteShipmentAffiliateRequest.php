<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Shipments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteShipmentAffiliateRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected int $id,
        protected array $affiliateIds
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/shipments/' . $this->id .'/affiliates';
    }

    protected function defaultQuery(): array
    {
        return [
            'affiliate_ids' => implode(';', $this->affiliateIds),
        ];
    }
}

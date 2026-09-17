<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Carts;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListCartsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $creationTimeFrom = null,
        protected ?string $language = null,
        protected ?bool $filledDeliveryInfo = null,
        protected ?bool $customerLoggedIn = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/carts';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('carts', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'language' => $this->language,
            'filled_delivery_info_yn' => $this->filledDeliveryInfo,
            'customer_logged_in_yn' => $this->customerLoggedIn,
        ];
    }
}

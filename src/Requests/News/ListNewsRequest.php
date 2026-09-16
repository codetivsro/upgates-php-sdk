<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\News;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListNewsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?string $creationTimeFrom = null,
        protected ?string $lastUpdateTimeFrom = null,
        protected ?bool $active = null,
        protected ?string $language = null,
    ) {

    }

    public function resolveEndpoint(): string
    {
        return '/news';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('news');
    }

    protected function defaultQuery(): array
    {
        return [
            'creation_time_from' => $this->creationTimeFrom,
            'last_update_time_from' => $this->lastUpdateTimeFrom,
            'active_yn' => $this->active,
            'language' => $this->language,
        ];
    }
}

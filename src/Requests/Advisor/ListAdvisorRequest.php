<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Advisor;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListAdvisorRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $id = null,
        protected ?string $creationTimeFrom = null,
        protected ?string $lastUpdateTimeFrom = null,
        protected ?bool $active = null,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/advisor';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('advices', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'id' => $this->id,
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
            'active_yn' => $this->active,
            'language' => $this->language,
        ];
    }
}

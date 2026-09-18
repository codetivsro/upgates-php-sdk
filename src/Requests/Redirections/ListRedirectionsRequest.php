<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Redirections;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\RedirectionType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListRedirectionsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $id = null,
        protected ?array $ids = null,
        protected ?string $code = null,
        protected ?RedirectionType $type = null,
        protected ?string $languageFrom = null,
        protected ?string $urlFrom = null,
        protected ?string $languageTo = null,
        protected ?string $urlTo = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/redirections';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('redirections', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'id' => $this->id,
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'code' => $this->code,
            'type' => $this->type?->value,
            'language_id_from' => $this->languageFrom,
            'url_from' => $this->urlFrom,
            'language_id_to' => $this->languageTo,
            'url_to' => $this->urlTo,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Translations;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Enums\TranslationType;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListTranslationsRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?string $key = null,
        protected ?string $keyLike = null,
        protected ?array $keys = null,
        protected ?bool $favorite = null,
        protected ?TranslationType $type = null,
        protected ?string $language = null,
        protected ?string $withoutTranslationInLanguage = null,
        protected ?string $translationLike = null,
        protected ?string $creationTimeFrom = null,
        protected ?string $lastUpdateTimeFrom = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/translations';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('translations', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'key' => $this->key,
            'key_like' => $this->keyLike,
            'keys' => $this->keys ? implode(';', $this->keys) : null,
            'favorite' => $this->favorite,
            'type' => $this->type?->value,
            'language' => $this->language,
            'without_translation_in_language' => $this->withoutTranslationInLanguage,
            'translation_like' => $this->translationLike,
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
            'last_update_time_from' => Helpers::convertQueryDateFormatOrNull($this->lastUpdateTimeFrom),
        ];
    }
}

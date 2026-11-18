<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\TranslationType;
use Codetiv\Upgates\Sdk\Requests\Translations\CreateTranslationsRequest;
use Codetiv\Upgates\Sdk\Requests\Translations\DeleteTranslationsRequest;
use Codetiv\Upgates\Sdk\Requests\Translations\GetTranslationRequest;
use Codetiv\Upgates\Sdk\Requests\Translations\ListTranslationsRequest;
use Codetiv\Upgates\Sdk\Requests\Translations\UpdateTranslationsRequest;
use Saloon\Http\BaseResource;

final class TranslationsResource extends BaseResource
{
    public function list(
        ?array $ids = null,
        ?string $key = null,
        ?string $keyLike = null,
        ?array $keys = null,
        ?bool $favorite = null,
        ?TranslationType $type = null,
        ?string $language = null,
        ?string $withoutTranslationInLanguage = null,
        ?string $translationLike = null,
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
    ): iterable {
        $request = new ListTranslationsRequest(
            $ids,
            $key,
            $keyLike,
            $keys,
            $favorite,
            $type,
            $language,
            $withoutTranslationInLanguage,
            $translationLike,
            $creationTimeFrom,
            $lastUpdateTimeFrom,
        );

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetTranslationRequest($id);

        return $this->connector->send($request)->array('translation', []);
    }

    public function create(array $data): array
    {
        $request = new CreateTranslationsRequest($data);

        return $this->connector->send($request)->array('translations', []);
    }

    public function update(array $data): array
    {
        $request = new UpdateTranslationsRequest($data);

        return $this->connector->send($request)->array('translations', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteTranslationsRequest($ids);

        return $this->connector->send($request)->array('translations', []);
    }
}

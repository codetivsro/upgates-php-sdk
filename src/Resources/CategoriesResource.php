<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Categories\CreateCategoriesRequest;
use Codetiv\Upgates\Sdk\Requests\Categories\DeleteCategoriesRequest;
use Codetiv\Upgates\Sdk\Requests\Categories\ListCategoriesRequest;
use Codetiv\Upgates\Sdk\Requests\Categories\UpdateCategoriesRequest;
use Saloon\Http\BaseResource;

final class CategoriesResource extends BaseResource
{
    public function list(
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
        ?array $codes = null,
        ?int $categoryId = null,
        ?array $ids = null,
        ?int $parentId = null,
        ?bool $active = null,
        ?bool $excludeFromSearch = null,
        ?string $language = null,
    ): iterable {
        $request = new ListCategoriesRequest(
            $creationTimeFrom,
            $lastUpdateTimeFrom,
            $codes,
            $categoryId,
            $ids,
            $parentId,
            $active,
            $excludeFromSearch,
            $language
        );

        return $this->connector->paginate($request)->items();
    }

    public function update(array $data): array
    {
        $request = new UpdateCategoriesRequest($data);

        return $this->connector->send($request)->array('categories', []);
    }

    public function create(array $data): array
    {
        $request = new CreateCategoriesRequest($data);

        return $this->connector->send($request)->array('categories', []);
    }

    public function delete(?int $id = null, ?array $ids = null, ?string $code = null): array
    {
        $request = new DeleteCategoriesRequest($id, $ids, $code);

        return $this->connector->send($request)->array('categories', []);
    }
}

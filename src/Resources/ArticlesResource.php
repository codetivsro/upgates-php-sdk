<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Articles\CreateArticleRequest;
use Codetiv\Upgates\Sdk\Requests\Articles\DeleteArticlesRequest;
use Codetiv\Upgates\Sdk\Requests\Articles\GetArticleRequest;
use Codetiv\Upgates\Sdk\Requests\Articles\ListArticlesRequest;
use Codetiv\Upgates\Sdk\Requests\Articles\UpdateArticleRequest;
use Saloon\Http\BaseResource;

final class ArticlesResource extends BaseResource
{
    public function list(
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?string $language = null,
        ?string $categoryCode = null,
        ?bool $withSubcategories = null,
    ): iterable {
        $request = new ListArticlesRequest(
            $creationTimeFrom,
            $lastUpdateTimeFrom,
            $active,
            $language,
            $categoryCode,
            $withSubcategories
        );

        return $this->connector->paginate($request)->items();
    }

    public function update(int $id, array $data): array
    {
        $request = new UpdateArticleRequest($id, $data);

        return $this->connector->send($request)->array(default: []);
    }

    public function create(array $data): array
    {
        $request = new CreateArticleRequest($data);

        return $this->connector->send($request)->array(default: []);
    }

    public function delete(int...$ids): array
    {
        $request = new DeleteArticlesRequest($ids);

        return $this->connector->send($request)->array('articles', []);
    }

    public function get(int $id): array
    {
        $request = new GetArticleRequest($id);

        return $this->connector->send($request)->array('articles', []);
    }
}

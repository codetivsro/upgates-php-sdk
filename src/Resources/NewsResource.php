<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\News\CreateNewsRequest;
use Codetiv\Upgates\Sdk\Requests\News\DeleteNewsRequest;
use Codetiv\Upgates\Sdk\Requests\News\GetNewsRequest;
use Codetiv\Upgates\Sdk\Requests\News\ListNewsRequest;
use Codetiv\Upgates\Sdk\Requests\News\UpdateNewsRequest;
use Saloon\Http\BaseResource;

final class NewsResource extends BaseResource
{
    public function list(
        ?int $id = null,
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?string $language = null,
    ): iterable {
        $request = new ListNewsRequest(
            $id,
            $creationTimeFrom,
            $lastUpdateTimeFrom,
            $active,
            $language
        );

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id, ?string $language = null): array
    {
        $request = new GetNewsRequest($id, $language);

        return $this->connector->send($request)->array('news', []);
    }

    public function create(array $data): array
    {
        $request = new CreateNewsRequest($data);

        return $this->connector->send($request)->array('news', []);
    }

    public function update(array $data): array
    {
        $request = new UpdateNewsRequest($data);

        return $this->connector->send($request)->array('news', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteNewsRequest($ids);

        return $this->connector->send($request)->array('news', []);
    }
}

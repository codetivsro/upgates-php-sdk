<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\MetaCategory;
use Codetiv\Upgates\Sdk\Enums\MetaType;
use Codetiv\Upgates\Sdk\Requests\Metas\CreateMetasRequest;
use Codetiv\Upgates\Sdk\Requests\Metas\DeleteMetasRequest;
use Codetiv\Upgates\Sdk\Requests\Metas\ListMetasRequest;
use Saloon\Http\BaseResource;

final class MetasResource extends BaseResource
{
    public function list(?string $key = null, ?MetaCategory $category = null, ?MetaType $type = null): iterable
    {
        $request = new ListMetasRequest($key, $category, $type);

        return $this->connector->paginate($request)->items();
    }

    public function create(array $data): array
    {
        $request = new CreateMetasRequest($data);

        return $this->connector->send($request)->array('metas', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteMetasRequest($ids);

        return $this->connector->send($request)->array('metas', []);
    }
}

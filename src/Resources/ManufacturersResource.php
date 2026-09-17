<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Manufacturers\DeleteManufacturersRequest;
use Codetiv\Upgates\Sdk\Requests\Manufacturers\GetManufacturerRequest;
use Codetiv\Upgates\Sdk\Requests\Manufacturers\ListManufacturersRequest;
use Saloon\Http\BaseResource;

final class ManufacturersResource extends BaseResource
{
    public function get(int $id): array
    {
        $request = new GetManufacturerRequest($id);

        return $this->connector->send($request)->array('manufacturers', []);
    }

    public function list(?array $ids = null): iterable
    {
        $request = new ListManufacturersRequest($ids);

        return $this->connector->paginate($request)->items();
    }

    public function delete(?int $id = null, ?array $ids = null): array
    {
        $request = new DeleteManufacturersRequest($id, $ids);

        return $this->connector->send($request)->array('manufacturers', []);
    }
}

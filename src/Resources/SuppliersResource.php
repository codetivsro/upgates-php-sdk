<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Suppliers\CreateSuppliersRequest;
use Codetiv\Upgates\Sdk\Requests\Suppliers\DeleteSuppliersRequest;
use Codetiv\Upgates\Sdk\Requests\Suppliers\GetSupplierRequest;
use Codetiv\Upgates\Sdk\Requests\Suppliers\ListSuppliersRequest;
use Codetiv\Upgates\Sdk\Requests\Suppliers\UpdateSuppliersRequest;
use Saloon\Http\BaseResource;

final class SuppliersResource extends BaseResource
{
    public function list(
        ?array $ids = null,
        ?string $name = null,
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
    ): iterable {
        $request = new ListSuppliersRequest($ids, $name, $creationTimeFrom, $lastUpdateTimeFrom);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetSupplierRequest($id);

        return $this->connector->send($request)->array('suppliers', []);
    }

    public function create(array $data): array
    {
        $request = new CreateSuppliersRequest($data);

        return $this->connector->send($request)->array('suppliers', []);
    }

    public function update(array $data): array
    {
        $request = new UpdateSuppliersRequest($data);

        return $this->connector->send($request)->array('suppliers', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteSuppliersRequest($ids);

        return $this->connector->send($request)->array('suppliers', []);
    }
}

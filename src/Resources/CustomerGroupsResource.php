<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\CustomerGroups\CreateCustomerGroupsRequest;
use Codetiv\Upgates\Sdk\Requests\CustomerGroups\DeleteCustomerGroupsRequest;
use Codetiv\Upgates\Sdk\Requests\CustomerGroups\ListCustomerGroupsRequest;
use Codetiv\Upgates\Sdk\Requests\CustomerGroups\UpdateCustomerGroupsRequest;
use Saloon\Http\BaseResource;

final class CustomerGroupsResource extends BaseResource
{
    public function list(?string $name = null, ?array $ids = null): iterable
    {
        $request = new ListCustomerGroupsRequest($name, $ids);

        return $this->connector->paginate($request)->items();
    }

    public function update(array $data): array
    {
        $request = new UpdateCustomerGroupsRequest($data);

        return $this->connector->send($request)->array('groups', []);
    }

    public function create(array $data): array
    {
        $request = new CreateCustomerGroupsRequest($data);

        return $this->connector->send($request)->array('groups', []);
    }

    public function delete(?int $id = null, ?array $ids = null): array
    {
        $request = new DeleteCustomerGroupsRequest($id, $ids);

        return $this->connector->send($request)->array('groups', []);
    }
}

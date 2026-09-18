<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Users\GetUserRequest;
use Codetiv\Upgates\Sdk\Requests\Users\GetUserRoleRequest;
use Codetiv\Upgates\Sdk\Requests\Users\ListUserPrivilegesRequest;
use Codetiv\Upgates\Sdk\Requests\Users\ListUserRolesRequest;
use Codetiv\Upgates\Sdk\Requests\Users\ListUsersRequest;
use Saloon\Http\BaseResource;

final class UsersResource extends BaseResource
{
    public function list(?bool $active = null): iterable
    {
        $request = new ListUsersRequest($active);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): ?array
    {
        $request = new GetUserRequest($id);

        return $this->connector->send($request)->array('user');
    }

    public function listRoles(): iterable
    {
        $request = new ListUserRolesRequest();

        return $this->connector->paginate($request)->items();
    }

    public function getRole(int $id): ?array
    {
        $request = new GetUserRoleRequest($id);

        return $this->connector->send($request)->array('role');
    }

    public function listPrivileges(): array
    {
        $request = new ListUserPrivilegesRequest();

        return $this->connector->send($request)->array('resources', []);
    }
}

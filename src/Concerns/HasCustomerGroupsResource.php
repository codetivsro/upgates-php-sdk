<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\CustomerGroupsResource;

trait HasCustomerGroupsResource
{
    public function customerGroups(): CustomerGroupsResource
    {
        return new CustomerGroupsResource($this);
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\AvailabilityType;
use Codetiv\Upgates\Sdk\Requests\Availabilities\CreateAvailabilitiesRequest;
use Codetiv\Upgates\Sdk\Requests\Availabilities\DeleteAvailabilityRequest;
use Codetiv\Upgates\Sdk\Requests\Availabilities\GetAvailabilityRequest;
use Codetiv\Upgates\Sdk\Requests\Availabilities\ListAvailabilitiesRequest;
use Codetiv\Upgates\Sdk\Requests\Availabilities\UpdateAvailabilitiesRequest;
use Saloon\Http\BaseResource;

final class AvailabilitiesResource extends BaseResource
{
    public function list(?AvailabilityType $type = null): iterable
    {
        $request = new ListAvailabilitiesRequest($type);

        return $this->connector->paginate($request)->items();
    }

    public function update(array $data): array
    {
        $request = new UpdateAvailabilitiesRequest($data);

        return $this->connector->send($request)->array('availabilities', []);
    }

    public function create(array $data): array
    {
        $request = new CreateAvailabilitiesRequest($data);

        return $this->connector->send($request)->array('availabilities', []);
    }

    public function get(int $id): array
    {
        $request = new GetAvailabilityRequest($id);

        return $this->connector->send($request)->array('availabilities', []);
    }

    public function delete(int $id): array
    {
        $request = new DeleteAvailabilityRequest($id);

        return $this->connector->send($request)->array('availabilities', []);
    }
}

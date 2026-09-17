<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Parameters\CreateParametersRequest;
use Codetiv\Upgates\Sdk\Requests\Parameters\DeleteParametersRequest;
use Codetiv\Upgates\Sdk\Requests\Parameters\DeleteParametersValuesRequest;
use Codetiv\Upgates\Sdk\Requests\Parameters\GetParameterRequest;
use Codetiv\Upgates\Sdk\Requests\Parameters\ListParametersRequest;
use Codetiv\Upgates\Sdk\Requests\Parameters\ListParametersValuesRequest;
use Codetiv\Upgates\Sdk\Requests\Parameters\UpdateParametersRequest;
use Saloon\Http\BaseResource;

final class ParametersResource extends BaseResource
{
    public function get(int $id): array
    {
        $request = new GetParameterRequest($id);

        return $this->connector->send($request)->array('parameters', []);
    }

    public function list(?array $ids = null, ?bool $withoutValues = null, ?string $language = null): iterable
    {
        $request = new ListParametersRequest($ids, $withoutValues, $language);

        return $this->connector->paginate($request)->items();
    }

    public function update(array $data): array
    {
        $request = new UpdateParametersRequest($data);

        return $this->connector->send($request)->array('parameters', []);
    }

    public function create(array $data): array
    {
        $request = new CreateParametersRequest($data);

        return $this->connector->send($request)->array('parameters', []);
    }

    public function delete(?int $id = null, ?array $ids = null): array
    {
        $request = new DeleteParametersRequest($id, $ids);

        return $this->connector->send($request)->array('parameters', []);
    }

    public function listValues(?array $ids = null, ?array $attributeIds = null, ?string $language = null): iterable
    {
        $request = new ListParametersValuesRequest($ids, $attributeIds, $language);

        return $this->connector->paginate($request)->items();
    }

    public function deleteValues(array $ids): array
    {
        $request = new DeleteParametersValuesRequest($ids);

        return $this->connector->send($request)->array('parameters', []);
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\LabelType;
use Codetiv\Upgates\Sdk\Requests\Labels\CreateLabelsRequest;
use Codetiv\Upgates\Sdk\Requests\Labels\DeleteLabelsRequest;
use Codetiv\Upgates\Sdk\Requests\Labels\GetLabelRequest;
use Codetiv\Upgates\Sdk\Requests\Labels\ListLabelsRequest;
use Saloon\Http\BaseResource;

final class LabelsResource extends BaseResource
{
    public function list(?array $ids = null, ?LabelType $type = null): iterable
    {
        $request = new ListLabelsRequest($ids, $type);

        return $this->connector->paginate($request)->items();
    }

    public function create(array $data): array
    {
        $request = new CreateLabelsRequest($data);

        return $this->connector->send($request)->array('labels', []);
    }

    public function delete(int ... $ids): array
    {
        $request = new DeleteLabelsRequest($ids);

        return $this->connector->send($request)->array('labels', []);
    }

    public function get(int $id): array
    {
        $request = new GetLabelRequest($id);

        return $this->connector->send($request)->array('labels', []);
    }
}

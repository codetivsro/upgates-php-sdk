<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Benefits\CreateBenefitsRequest;
use Codetiv\Upgates\Sdk\Requests\Benefits\DeleteBenefitsRequest;
use Codetiv\Upgates\Sdk\Requests\Benefits\GetBenefitRequest;
use Codetiv\Upgates\Sdk\Requests\Benefits\ListBenefitsRequest;
use Codetiv\Upgates\Sdk\Requests\Benefits\UpdateBenefitsRequest;
use Saloon\Http\BaseResource;

final class BenefitsResource extends BaseResource
{
    public function list(?array $ids = null, ?bool $active = null): iterable
    {
        $request = new ListBenefitsRequest($ids, $active);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetBenefitRequest($id);

        return $this->connector->send($request)->array('benefits', []);
    }

    public function create(array $data): array
    {
        $request = new CreateBenefitsRequest($data);

        return $this->connector->send($request)->array('benefits', []);
    }

    public function update(array $data): array
    {
        $request = new UpdateBenefitsRequest($data);

        return $this->connector->send($request)->array('benefits', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteBenefitsRequest($ids);

        return $this->connector->send($request)->array('benefits', []);
    }
}

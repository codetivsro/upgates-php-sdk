<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\RecyclingFees\CreateRecyclingFeesRequest;
use Codetiv\Upgates\Sdk\Requests\RecyclingFees\DeleteRecyclingFeesRequest;
use Codetiv\Upgates\Sdk\Requests\RecyclingFees\GetRecyclingFeeRequest;
use Codetiv\Upgates\Sdk\Requests\RecyclingFees\ListRecyclingFeesRequest;
use Codetiv\Upgates\Sdk\Requests\RecyclingFees\UpdateRecyclingFeesRequest;
use Saloon\Http\BaseResource;

final class RecyclingFeesResource extends BaseResource
{
    public function list(
        ?array $ids = null,
        ?string $name = null,
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
    ): iterable {
        $request = new ListRecyclingFeesRequest($ids, $name, $creationTimeFrom, $lastUpdateTimeFrom);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetRecyclingFeeRequest($id);

        return $this->connector->send($request)->array('recycling_fees', []);
    }

    public function create(array $data): array
    {
        $request = new CreateRecyclingFeesRequest($data);

        return $this->connector->send($request)->array('recycling_fees', []);
    }

    public function update(array $data): array
    {
        $request = new UpdateRecyclingFeesRequest($data);

        return $this->connector->send($request)->array('recycling_fees', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteRecyclingFeesRequest($ids);

        return $this->connector->send($request)->array('recycling_fees', []);
    }
}

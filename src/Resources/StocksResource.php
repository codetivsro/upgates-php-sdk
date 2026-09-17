<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Stocks\CreateStocksRequest;
use Codetiv\Upgates\Sdk\Requests\Stocks\DeleteStocksRequest;
use Codetiv\Upgates\Sdk\Requests\Stocks\GetStockRequest;
use Codetiv\Upgates\Sdk\Requests\Stocks\ListStocksRequest;
use Codetiv\Upgates\Sdk\Requests\Stocks\UpdateStocksRequest;
use Saloon\Http\BaseResource;

final class StocksResource extends BaseResource
{
    public function get(int $id): array
    {
        $request = new GetStockRequest($id);

        return $this->connector->send($request)->array('stocks', []);
    }

    public function list(): iterable
    {
        $request = new ListStocksRequest();

        return $this->connector->paginate($request)->items();
    }

    public function update(array $data): array
    {
        $request = new UpdateStocksRequest($data);

        return $this->connector->send($request)->array('stocks', []);
    }

    public function create(array $data): array
    {
        $request = new CreateStocksRequest($data);

        return $this->connector->send($request)->array('stocks', []);
    }

    public function delete(?int $id = null, ?array $ids = null): array
    {
        $request = new DeleteStocksRequest($id, $ids);

        return $this->connector->send($request)->array('stocks', []);
    }
}

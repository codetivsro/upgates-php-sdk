<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\PriceLists\CreatePriceListRequest;
use Codetiv\Upgates\Sdk\Requests\PriceLists\DeletePriceListRequest;
use Codetiv\Upgates\Sdk\Requests\PriceLists\GetPriceListRequest;
use Codetiv\Upgates\Sdk\Requests\PriceLists\ListPriceListsRequest;
use Saloon\Http\BaseResource;

final class PriceListsResource extends BaseResource
{
    public function list(): array
    {
        $request = new ListPriceListsRequest();

        return $this->connector->send($request)->array('pricelists', []);
    }

    public function create(string $name, float $percent): array
    {
        $request = new CreatePriceListRequest($name, $percent);

        return $this->connector->send($request)->array('pricelists', []);
    }

    public function get(int $id): array
    {
        $request = new GetPriceListRequest($id);

        return $this->connector->send($request)->array('pricelists', []);
    }

    public function delete(int $id): array
    {
        $request = new DeletePriceListRequest($id);

        return $this->connector->send($request)->array('pricelists', []);
    }
}

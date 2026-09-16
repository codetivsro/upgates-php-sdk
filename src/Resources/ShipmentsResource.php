<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\ShipmentType;
use Codetiv\Upgates\Sdk\Requests\Shipments\CreateShipmentAffiliateRequest;
use Codetiv\Upgates\Sdk\Requests\Shipments\DeleteShipmentAffiliateRequest;
use Codetiv\Upgates\Sdk\Requests\Shipments\GetShipmentRequest;
use Codetiv\Upgates\Sdk\Requests\Shipments\ListShipmentAffiliatesRequest;
use Codetiv\Upgates\Sdk\Requests\Shipments\ListShipmentsRequest;
use Saloon\Http\BaseResource;

final class ShipmentsResource extends BaseResource
{
    public function list(
        ?array $codes = null,
        ?ShipmentType $type = null
    ): iterable {
        $request = new ListShipmentsRequest(
            $codes,
            $type
        );

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetShipmentRequest($id);

        return $this->connector->send($request)->array('shipments', []);
    }

    public function listAffiliates(int $id): iterable
    {
        $request = new ListShipmentAffiliatesRequest($id);

        return $this->connector->paginate($request)->items();
    }

    public function createAffiliate(int $id, array $affiliateData): array
    {
        $request = new CreateShipmentAffiliateRequest($id, $affiliateData);

        return $this->connector->send($request)->array('affiliates', []);
    }

    public function deleteAffiliates(int $id, int ...$affiliateIds): array
    {
        $request = new DeleteShipmentAffiliateRequest($id, $affiliateIds);

        return $this->connector->send($request)->array('affiliates', []);
    }
}

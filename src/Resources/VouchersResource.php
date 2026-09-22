<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\VoucherType;
use Codetiv\Upgates\Sdk\Requests\Vouchers\CreateVoucherRequest;
use Codetiv\Upgates\Sdk\Requests\Vouchers\DeleteVouchersRequest;
use Codetiv\Upgates\Sdk\Requests\Vouchers\ListVouchersRequest;
use Saloon\Http\BaseResource;

final class VouchersResource extends BaseResource
{
    public function list(
        ?string $code = null,
        ?array $codes = null,
        ?string $currency = null,
        ?bool $active = null,
        ?bool $forProductsInAction = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?bool $global = null
    ): iterable {
        $request = new ListVouchersRequest(
            $code,
            $codes,
            $currency,
            $active,
            $forProductsInAction,
            $dateFrom,
            $dateTo,
            $global
        );

        return $this->connector->paginate($request)->items();
    }

    public function create(
        VoucherType $type,
        string $currency,
        float $amount,
        ?int $count = null,
        ?bool $active = null,
        ?bool $global = null,
        ?bool $forProductsInAction = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?float $usedFrom = null
    ): array {
        $request = new CreateVoucherRequest(
            $type,
            $currency,
            $amount,
            $count,
            $active,
            $global,
            $forProductsInAction,
            $dateFrom,
            $dateTo,
            $usedFrom
        );

        return $this->connector->send($request)->array('vouchers', []);
    }

    public function delete(string... $codes): array
    {
        $request = new DeleteVouchersRequest($codes);

        return $this->connector->send($request)->array('vouchers', []);
    }
}

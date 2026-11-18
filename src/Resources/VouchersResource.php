<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\VoucherType;
use Codetiv\Upgates\Sdk\Requests\Vouchers\CreateVoucherRequest;
use Codetiv\Upgates\Sdk\Requests\Vouchers\DeleteVouchersRequest;
use Codetiv\Upgates\Sdk\Requests\Vouchers\GetVoucherRequest;
use Codetiv\Upgates\Sdk\Requests\Vouchers\ListVouchersRequest;
use Codetiv\Upgates\Sdk\Requests\Vouchers\UpdateVoucherRequest;
use Saloon\Http\BaseResource;

final class VouchersResource extends BaseResource
{
    public function list(
        ?string $code = null,
        ?array $codes = null,
        ?string $currency = null,
        ?string $language = null,
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
            $language,
            $active,
            $forProductsInAction,
            $dateFrom,
            $dateTo,
            $global
        );

        return $this->connector->paginate($request)->items();
    }

    public function get(string $id, ?string $currency = null): array
    {
        $request = new GetVoucherRequest($id, $currency);

        return $this->connector->send($request)->array('vouchers', []);
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
        ?float $usedFrom = null,
        ?int $maxUsageCount = null,
        ?int $maxUsagePerCustomer = null,
        ?array $categories = null,
        ?string $note = null,
        ?string $language = null,
        ?string $voucherCode = null,
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
            $usedFrom,
            $maxUsageCount,
            $maxUsagePerCustomer,
            $categories,
            $note,
            $language,
            $voucherCode,
        );

        return $this->connector->send($request)->array('vouchers', []);
    }

    public function update(
        int $id,
        ?bool $active = null,
        ?bool $forProductsInAction = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?float $amount = null,
        ?float $usedFrom = null,
        ?int $maxUsageCount = null,
        ?int $maxUsagePerCustomer = null,
        ?array $categories = null,
        ?string $note = null,
        ?string $language = null,
    ): array {
        $request = new UpdateVoucherRequest(
            $id,
            $active,
            $forProductsInAction,
            $dateFrom,
            $dateTo,
            $amount,
            $usedFrom,
            $maxUsageCount,
            $maxUsagePerCustomer,
            $categories,
            $note,
            $language,
        );

        return $this->connector->send($request)->array('vouchers', []);
    }

    public function delete(string... $codes): array
    {
        $request = new DeleteVouchersRequest($codes);

        return $this->connector->send($request)->array('vouchers', []);
    }
}

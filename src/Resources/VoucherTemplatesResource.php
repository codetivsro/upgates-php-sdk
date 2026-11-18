<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\VoucherType;
use Codetiv\Upgates\Sdk\Requests\VoucherTemplates\CreateVoucherTemplateRequest;
use Codetiv\Upgates\Sdk\Requests\VoucherTemplates\DeleteVoucherTemplatesRequest;
use Codetiv\Upgates\Sdk\Requests\VoucherTemplates\GetVoucherTemplateRequest;
use Codetiv\Upgates\Sdk\Requests\VoucherTemplates\ListVoucherTemplatesRequest;
use Codetiv\Upgates\Sdk\Requests\VoucherTemplates\UpdateVoucherTemplateRequest;
use Saloon\Http\BaseResource;

final class VoucherTemplatesResource extends BaseResource
{
    public function list(
        ?string $name = null,
        ?string $currency = null,
        ?string $language = null,
        ?bool $active = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?bool $global = null,
    ): iterable {
        $request = new ListVoucherTemplatesRequest($name, $currency, $language, $active, $dateFrom, $dateTo, $global);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetVoucherTemplateRequest($id);

        return $this->connector->send($request)->array('voucher_template', []);
    }

    public function create(
        string $name,
        VoucherType $type,
        string $currency,
        float $amount,
        ?bool $active = null,
        ?bool $global = null,
        ?bool $forProductsInAction = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?float $usedFrom = null,
        ?string $language = null,
        ?int $maxUsageCount = null,
        ?int $maxUsagePerCustomer = null,
        ?string $note = null,
    ): array {
        $request = new CreateVoucherTemplateRequest(
            $name,
            $type,
            $currency,
            $amount,
            $active,
            $global,
            $forProductsInAction,
            $dateFrom,
            $dateTo,
            $usedFrom,
            $language,
            $maxUsageCount,
            $maxUsagePerCustomer,
            $note,
        );

        return $this->connector->send($request)->array('voucher_template', []);
    }

    public function update(
        int $id,
        ?string $name = null,
        ?bool $active = null,
        ?bool $forProductsInAction = null,
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?float $amount = null,
        ?float $usedFrom = null,
        ?string $language = null,
        ?int $maxUsageCount = null,
        ?int $maxUsagePerCustomer = null,
        ?string $note = null,
    ): array {
        $request = new UpdateVoucherTemplateRequest(
            $id,
            $name,
            $active,
            $forProductsInAction,
            $dateFrom,
            $dateTo,
            $amount,
            $usedFrom,
            $language,
            $maxUsageCount,
            $maxUsagePerCustomer,
            $note,
        );

        return $this->connector->send($request)->array('voucher_template', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteVoucherTemplatesRequest($ids);

        return $this->connector->send($request)->array('voucher_templates', []);
    }
}

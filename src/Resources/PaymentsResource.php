<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Payments\GetPaymentRequest;
use Codetiv\Upgates\Sdk\Requests\Payments\ListPaymentsRequest;
use Saloon\Http\BaseResource;

final class PaymentsResource extends BaseResource
{
    public function list(?array $ids = null, ?string $code = null, ?array $codes = null, ?string $type = null): iterable
    {
        $request = new ListPaymentsRequest($ids, $code, $codes, $type);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetPaymentRequest($id);

        return $this->connector->send($request)->array('payments', []);
    }
}

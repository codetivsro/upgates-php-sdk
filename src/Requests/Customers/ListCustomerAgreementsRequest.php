<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Customers;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListCustomerAgreementsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $customerId,
        protected ?string $email = null,
        protected ?bool $onlyValid = null,
        protected ?bool $status = null,
        protected ?int $agreementId = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/customers/' . $this->customerId . '/agreements';
    }

    protected function defaultQuery(): array
    {
        return [
            'email' => $this->email,
            'only_valid_yn' => $this->onlyValid,
            'status' => $this->status,
            'agreement_id' => $this->agreementId,
        ];
    }
}

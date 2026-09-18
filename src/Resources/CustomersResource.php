<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Customers\AttemptLoginRequest;
use Codetiv\Upgates\Sdk\Requests\Customers\CreateCustomersRequest;
use Codetiv\Upgates\Sdk\Requests\Customers\DeleteCustomersRequest;
use Codetiv\Upgates\Sdk\Requests\Customers\ListCustomerAgreementsRequest;
use Codetiv\Upgates\Sdk\Requests\Customers\ListCustomersResource;
use Codetiv\Upgates\Sdk\Requests\Customers\UpdateCustomersRequest;
use Saloon\Http\BaseResource;
use SensitiveParameter;

final class CustomersResource extends BaseResource
{
    public function list(
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
        ?string $code = null,
        ?int $id = null,
        ?array $ids = null,
        ?bool $active = null,
        ?bool $blocked = null,
        ?string $language = null,
        ?string $pricelist = null,
        ?string $email = null,
        ?string $phone = null,
        ?string $companyName = null,
        ?string $companyNumber = null,
        ?string $companyVatNumber = null,
        ?string $newsletterAccept = null
    ): iterable {
        $request = new ListCustomersResource(
            $creationTimeFrom,
            $lastUpdateTimeFrom,
            $code,
            $id,
            $ids,
            $active,
            $blocked,
            $language,
            $pricelist,
            $email,
            $phone,
            $companyName,
            $companyNumber,
            $companyVatNumber,
            $newsletterAccept
        );

        return $this->connector->paginate($request)->items();
    }

    public function update(array $data): array
    {
        $request = new UpdateCustomersRequest($data);

        return $this->connector->send($request)->array('customers', []);
    }

    public function create(array $data): array
    {
        $request = new CreateCustomersRequest($data);

        return $this->connector->send($request)->array('customers', []);
    }

    public function delete(?int $id = null, ?array $ids = null, ?string $email = null): array
    {
        $request = new DeleteCustomersRequest($id, $ids, $email);

        return $this->connector->send($request)->array('customers', []);
    }

    public function listAgreements(
        int $customerId,
        ?string $email = null,
        ?bool $onlyValid = null,
        ?bool $status = null,
        ?int $agreementId = null
    ): array {
        $request = new ListCustomerAgreementsRequest(
            $customerId,
            $email,
            $onlyValid,
            $status,
            $agreementId
        );

        return $this->connector->send($request)->array('agreements', []);
    }

    public function attemptLogin(string $email, #[SensitiveParameter] string $password): array
    {
        $request = new AttemptLoginRequest($email, $password);

        return $this->connector->send($request)->array(default: []);
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Advisor\CreateAdvisorRequest;
use Codetiv\Upgates\Sdk\Requests\Advisor\DeleteAdvisorRequest;
use Codetiv\Upgates\Sdk\Requests\Advisor\GetAdvisorRequest;
use Codetiv\Upgates\Sdk\Requests\Advisor\ListAdvisorRequest;
use Codetiv\Upgates\Sdk\Requests\Advisor\UpdateAdvisorRequest;
use Saloon\Http\BaseResource;

final class AdvisorResource extends BaseResource
{
    public function list(
        ?int $id = null,
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?string $language = null,
    ): iterable {
        $request = new ListAdvisorRequest(
            $id,
            $creationTimeFrom,
            $lastUpdateTimeFrom,
            $active,
            $language
        );

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id, ?string $language = null): array
    {
        $request = new GetAdvisorRequest($id, $language);

        return $this->connector->send($request)->array('advices', []);
    }

    public function create(array $data): array
    {
        $request = new CreateAdvisorRequest($data);

        return $this->connector->send($request)->array('advices', []);
    }

    public function update(array $data): array
    {
        $request = new UpdateAdvisorRequest($data);

        return $this->connector->send($request)->array('advices', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteAdvisorRequest($ids);

        return $this->connector->send($request)->array('advices', []);
    }
}

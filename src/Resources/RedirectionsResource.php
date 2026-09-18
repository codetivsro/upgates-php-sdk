<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\RedirectionType;
use Codetiv\Upgates\Sdk\Requests\Redirections\CreateRedirectionsRequest;
use Codetiv\Upgates\Sdk\Requests\Redirections\DeleteRedirectionsRequest;
use Codetiv\Upgates\Sdk\Requests\Redirections\ListRedirectionsRequest;
use Saloon\Http\BaseResource;

final class RedirectionsResource extends BaseResource
{
    public function list(
        ?int $id = null,
        ?array $ids = null,
        ?string $code = null,
        ?RedirectionType $type = null,
        ?string $languageFrom = null,
        ?string $urlFrom = null,
        ?string $languageTo = null,
        ?string $urlTo = null,
    ): iterable {
        $request = new ListRedirectionsRequest(
            $id,
            $ids,
            $code,
            $type,
            $languageFrom,
            $urlFrom,
            $languageTo,
            $urlTo
        );

        return $this->connector->paginate($request)->items();
    }

    public function create(array $data): array
    {
        $request = new CreateRedirectionsRequest($data);

        return $this->connector->send($request)->array('redirections', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeleteRedirectionsRequest($ids);

        return $this->connector->send($request)->array('redirections', []);
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\PriceFormulas\CreatePriceFormulasRequest;
use Codetiv\Upgates\Sdk\Requests\PriceFormulas\DeletePriceFormulasRequest;
use Codetiv\Upgates\Sdk\Requests\PriceFormulas\GetPriceFormulaRequest;
use Codetiv\Upgates\Sdk\Requests\PriceFormulas\ListPriceFormulasRequest;
use Codetiv\Upgates\Sdk\Requests\PriceFormulas\UpdatePriceFormulasRequest;
use Saloon\Http\BaseResource;

final class PriceFormulasResource extends BaseResource
{
    public function list(
        ?array $ids = null,
        ?string $name = null,
        ?string $creationTimeFrom = null,
        ?string $lastUpdateTimeFrom = null,
    ): iterable {
        $request = new ListPriceFormulasRequest($ids, $name, $creationTimeFrom, $lastUpdateTimeFrom);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetPriceFormulaRequest($id);

        return $this->connector->send($request)->array('pricing_formulas', []);
    }

    public function create(array $data): array
    {
        $request = new CreatePriceFormulasRequest($data);

        return $this->connector->send($request)->array('pricing_formulas', []);
    }

    public function update(array $data): array
    {
        $request = new UpdatePriceFormulasRequest($data);

        return $this->connector->send($request)->array('pricing_formulas', []);
    }

    public function delete(int ...$ids): array
    {
        $request = new DeletePriceFormulasRequest($ids);

        return $this->connector->send($request)->array('pricing_formulas', []);
    }
}

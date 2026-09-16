<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Contracts;

use Saloon\Http\Response;

interface HasCustomPaginatedItems
{
    public function getItemsFromResponse(Response $response): array;
}

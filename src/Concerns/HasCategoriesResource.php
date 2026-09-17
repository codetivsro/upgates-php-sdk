<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\CategoriesResource;

trait HasCategoriesResource
{
    public function categories(): CategoriesResource
    {
        return new CategoriesResource($this);
    }
}

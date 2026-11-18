<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\BenefitsResource;

trait HasBenefitsResource
{
    public function benefits(): BenefitsResource
    {
        return new BenefitsResource($this);
    }
}

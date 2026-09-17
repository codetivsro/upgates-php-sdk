<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\ConversionCodesResource;

trait HasConversionCodesResource
{
    public function conversionCodes(): ConversionCodesResource
    {
        return new ConversionCodesResource($this);
    }
}

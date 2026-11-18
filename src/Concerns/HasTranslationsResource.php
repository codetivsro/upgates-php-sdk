<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\TranslationsResource;

trait HasTranslationsResource
{
    public function translations(): TranslationsResource
    {
        return new TranslationsResource($this);
    }
}

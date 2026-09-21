<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\FilesResource;

trait HasFilesResource
{
    public function files(): FilesResource
    {
        return new FilesResource($this);
    }
}

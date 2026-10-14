<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\GraphicsBackupsResource;

trait HasGraphicsBackupsResource
{
    public function graphicsBackups(): GraphicsBackupsResource
    {
        return new GraphicsBackupsResource($this);
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\LabelsResource;

trait HasLabelsResource
{
    public function labels(): LabelsResource
    {
        return new LabelsResource($this);
    }
}

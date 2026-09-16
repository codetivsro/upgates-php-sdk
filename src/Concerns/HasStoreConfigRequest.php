<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Requests\GetConfigRequest;

trait HasStoreConfigRequest
{
    public function storeConfig(): array
    {
        return $this->send(new GetConfigRequest())->array('config', []);
    }
}

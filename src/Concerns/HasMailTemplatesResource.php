<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Concerns;

use Codetiv\Upgates\Sdk\Resources\MailTemplatesResource;

trait HasMailTemplatesResource
{
    public function mailTemplates(): MailTemplatesResource
    {
        return new MailTemplatesResource($this);
    }
}

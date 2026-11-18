<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteMailTemplateRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected int $id
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates/' . $this->id;
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class ListMailTemplateFilesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int $id,
        protected ?string $language = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates/' . $this->id . '/files';
    }

    protected function defaultQuery(): array
    {
        return [
            'language' => $this->language,
        ];
    }
}

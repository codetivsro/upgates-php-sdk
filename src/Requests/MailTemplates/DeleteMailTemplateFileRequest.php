<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class DeleteMailTemplateFileRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected int $id,
        protected int $mailTemplateFileId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates/' . $this->id . '/files';
    }

    protected function defaultQuery(): array
    {
        return [
            'mail_template_file_id' => $this->mailTemplateFileId,
        ];
    }
}

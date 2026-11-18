<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateMailTemplateFileRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $id,
        protected int $mailTemplateFileId,
        protected ?string $title = null,
        protected ?int $position = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates/' . $this->id . '/files';
    }

    protected function defaultBody(): array
    {
        return [
            'mail_template_file_id' => $this->mailTemplateFileId,
            'title' => $this->title,
            'position' => $this->position,
        ];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}

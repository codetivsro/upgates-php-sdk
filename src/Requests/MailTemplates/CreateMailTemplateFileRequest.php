<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateMailTemplateFileRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $id,
        protected string $language,
        protected int $fileId,
        protected ?string $title = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates/' . $this->id . '/files';
    }

    protected function defaultBody(): array
    {
        return [
            'language' => $this->language,
            'file_id' => $this->fileId,
            'title' => $this->title,
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

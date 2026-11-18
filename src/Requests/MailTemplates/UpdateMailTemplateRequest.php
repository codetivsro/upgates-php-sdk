<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Codetiv\Upgates\Sdk\Enums\MailTemplateEditorType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class UpdateMailTemplateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        protected int $id,
        protected ?string $name = null,
        protected ?bool $active = null,
        protected ?MailTemplateEditorType $editorType = null,
        protected ?bool $attachOrderAttachments = null,
        protected ?array $descriptions = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates/' . $this->id;
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'active_yn' => $this->active,
            'editor_type' => $this->editorType?->value,
            'attach_order_attachments_yn' => $this->attachOrderAttachments,
            'descriptions' => $this->descriptions,
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

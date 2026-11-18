<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Codetiv\Upgates\Sdk\Enums\MailTemplateEditorType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

final class CreateMailTemplateRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $name,
        protected MailTemplateEditorType $editorType,
        protected array $descriptions,
        protected ?bool $active = null,
        protected ?bool $attachOrderAttachments = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates';
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'editor_type' => $this->editorType->value,
            'descriptions' => $this->descriptions,
            'active_yn' => $this->active,
            'attach_order_attachments_yn' => $this->attachOrderAttachments,
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

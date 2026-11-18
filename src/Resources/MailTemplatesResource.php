<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\MailTemplateEditorType;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\CreateMailTemplateFileRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\CreateMailTemplateRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\DeleteMailTemplateFileRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\DeleteMailTemplateRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\GetMailTemplateRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\ListMailTemplateFilesRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\ListMailTemplatesRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\UpdateMailTemplateFileRequest;
use Codetiv\Upgates\Sdk\Requests\MailTemplates\UpdateMailTemplateRequest;
use Saloon\Http\BaseResource;

final class MailTemplatesResource extends BaseResource
{
    public function list(
        ?array $ids = null,
        ?string $name = null,
        ?bool $default = null,
        ?bool $sendWithOrder = null,
        ?string $creationTimeFrom = null,
    ): iterable {
        $request = new ListMailTemplatesRequest($ids, $name, $default, $sendWithOrder, $creationTimeFrom);

        return $this->connector->paginate($request)->items();
    }

    public function get(int $id): array
    {
        $request = new GetMailTemplateRequest($id);

        return $this->connector->send($request)->array('mail_template', []);
    }

    public function create(
        string $name,
        MailTemplateEditorType $editorType,
        array $descriptions,
        ?bool $active = null,
        ?bool $attachOrderAttachments = null,
    ): array {
        $request = new CreateMailTemplateRequest($name, $editorType, $descriptions, $active, $attachOrderAttachments);

        return $this->connector->send($request)->array('mail_template', []);
    }

    public function update(
        int $id,
        ?string $name = null,
        ?bool $active = null,
        ?MailTemplateEditorType $editorType = null,
        ?bool $attachOrderAttachments = null,
        ?array $descriptions = null,
    ): array {
        $request = new UpdateMailTemplateRequest($id, $name, $active, $editorType, $attachOrderAttachments, $descriptions);

        return $this->connector->send($request)->array('mail_template', []);
    }

    public function delete(int $id): array
    {
        $request = new DeleteMailTemplateRequest($id);

        return $this->connector->send($request)->array(default: []);
    }

    public function listFiles(int $id, ?string $language = null): array
    {
        $request = new ListMailTemplateFilesRequest($id, $language);

        return $this->connector->send($request)->array('files', []);
    }

    public function createFile(int $id, string $language, int $fileId, ?string $title = null): array
    {
        $request = new CreateMailTemplateFileRequest($id, $language, $fileId, $title);

        return $this->connector->send($request)->array('file', []);
    }

    public function updateFile(int $id, int $mailTemplateFileId, ?string $title = null, ?int $position = null): array
    {
        $request = new UpdateMailTemplateFileRequest($id, $mailTemplateFileId, $title, $position);

        return $this->connector->send($request)->array('file', []);
    }

    public function deleteFile(int $id, int $mailTemplateFileId): array
    {
        $request = new DeleteMailTemplateFileRequest($id, $mailTemplateFileId);

        return $this->connector->send($request)->array(default: []);
    }
}

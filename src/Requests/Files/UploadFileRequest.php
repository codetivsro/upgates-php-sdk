<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Files;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

final class UploadFileRequest extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $filePath,
        protected ?string $fileName = null,
        protected ?int $categoryId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/files/file';
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue('file', $this->filePath, $this->fileName),
            $this->fileName ? new MultipartValue('file_name', $this->fileName) : null,
            $this->categoryId ? new MultipartValue('category_id', $this->categoryId) : null,
        ];
    }
}

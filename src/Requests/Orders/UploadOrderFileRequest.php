<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

final class UploadOrderFileRequest extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $number,
        protected string $filePath,
        protected ?string $fileName = null,
        protected ?string $code = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/orders/' . $this->number . '/file';
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue('file', $this->filePath, $this->fileName),
            $this->fileName ? new MultipartValue('file_name', $this->fileName) : null,
            $this->code ? new MultipartValue('code', $this->code) : null,
        ];
    }
}

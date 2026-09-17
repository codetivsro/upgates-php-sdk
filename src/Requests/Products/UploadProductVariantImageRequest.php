<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Products;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

final class UploadProductVariantImageRequest extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $variantId,
        protected string $filePath,
        protected ?string $fileName = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/products/' . $this->variantId . '/variant-image';
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue('file', $this->filePath, $this->fileName),
            $this->fileName ? new MultipartValue('file_name', $this->fileName) : null,
        ];
    }
}

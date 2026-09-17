<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Products\CreateProductsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\DeleteProductsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\DeleteProductVariantsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductFilesRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductLabelsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductParametersRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductPricesRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductRelatedRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductSimpleRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsImagesQueueRequest;
use Codetiv\Upgates\Sdk\Requests\Products\UpdateProductsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\UploadProductImageRequest;
use Codetiv\Upgates\Sdk\Requests\Products\UploadProductVariantImageRequest;
use Saloon\Http\BaseResource;

final class ProductsResource extends BaseResource
{
    public function update(array $data): array
    {
        $request = new UpdateProductsRequest($data);

        return $this->connector->send($request)->array('products', []);
    }

    public function create(array $data): array
    {
        $request = new CreateProductsRequest($data);

        return $this->connector->send($request)->array('products', []);
    }

    public function delete(?string $code = null, ?array $codes = null): array
    {
        $request = new DeleteProductsRequest($code, $codes);

        return $this->connector->send($request)->array('products', []);
    }

    public function get(string $code): array
    {
        $request = new GetProductRequest($code);

        return $this->connector->send($request)->array('products', []);
    }

    public function getSimple(string $code): array
    {
        $request = new GetProductSimpleRequest($code);

        return $this->connector->send($request)->array('products', []);
    }

    public function getPrices(string $code): array
    {
        $request = new GetProductPricesRequest($code);

        return $this->connector->send($request)->array('products', []);
    }

    public function getParameters(string $code): array
    {
        $request = new GetProductParametersRequest($code);

        return $this->connector->send($request)->array('products', []);
    }

    public function getLabels(string $code): array
    {
        $request = new GetProductLabelsRequest($code);

        return $this->connector->send($request)->array('products', []);
    }

    public function getFiles(string $code): array
    {
        $request = new GetProductFilesRequest($code);

        return $this->connector->send($request)->array('products', []);
    }

    public function getRelated(string $code): array
    {
        $request = new GetProductRelatedRequest($code);

        return $this->connector->send($request)->array('products', []);
    }

    public function uploadImage(int $id, string $filePath, ?string $fileName = null): array
    {
        $request = new UploadProductImageRequest($id, $filePath, $fileName);

        return $this->connector->send($request)->array(default: []);
    }

    public function uploadVariantImage(int $variantId, string $filePath, ?string $fileName = null): array
    {
        $request = new UploadProductVariantImageRequest($variantId, $filePath, $fileName);

        return $this->connector->send($request)->array(default: []);
    }

    public function listImagesQueue(
        ?string $code = null,
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null
    ): iterable {
        $request = new ListProductsImagesQueueRequest(
            $code,
            $codes,
            $id,
            $ids,
            $variantCodes
        );

        return $this->connector->paginate($request)->items();
    }

    public function deleteVariants(array $codes): array
    {
        $request = new DeleteProductVariantsRequest($codes);

        return $this->connector->send($request)->array('variants', []);
    }
}

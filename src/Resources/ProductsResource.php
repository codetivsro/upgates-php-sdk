<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Products\CreateProductRatingReviewRequest;
use Codetiv\Upgates\Sdk\Requests\Products\CreateProductsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\DeleteProductRatingsReviewsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\DeleteProductsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\DeleteProductVariantsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductFilesRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductLabelsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductParametersRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductPricesRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductRelatedRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductRequest;
use Codetiv\Upgates\Sdk\Requests\Products\GetProductSimpleRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsCompleteRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsFilesRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsImagesQueueRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsLabelsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsParametersRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsPricesRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsRatingsReviewsRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsSimpleRequest;
use Codetiv\Upgates\Sdk\Requests\Products\ListProductsVariantsRequest;
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

    public function listComplete(
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?bool $archived = null,
        ?bool $canAddToBasket = null,
        ?bool $excludeFromSearch = null,
        ?bool $inStock = null,
        ?string $language = null,
        ?array $languages = null,
        ?string $pricelist = null,
        ?bool $variants = null,
    ): iterable {
        $request = new ListProductsCompleteRequest(
            $codes,
            $id,
            $ids,
            $variantCodes,
            $lastUpdateTimeFrom,
            $active,
            $archived,
            $canAddToBasket,
            $excludeFromSearch,
            $inStock,
            $language,
            $languages,
            $pricelist,
            $variants
        );

        return $this->connector->paginate($request)->items();
    }

    public function listSimple(
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?bool $archived = null,
        ?bool $canAddToBasket = null,
        ?bool $excludeFromSearch = null,
        ?bool $inStock = null,
        ?bool $variants = null,
    ): iterable {
        $request = new ListProductsSimpleRequest(
            $codes,
            $id,
            $ids,
            $variantCodes,
            $lastUpdateTimeFrom,
            $active,
            $archived,
            $canAddToBasket,
            $excludeFromSearch,
            $inStock,
            $variants
        );

        return $this->connector->paginate($request)->items();
    }

    public function listPrices(
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?bool $archived = null,
        ?bool $canAddToBasket = null,
        ?bool $excludeFromSearch = null,
        ?bool $inStock = null,
        ?string $language = null,
        ?array $languages = null,
        ?string $pricelist = null,
        ?bool $variants = null,
    ): iterable {
        $request = new ListProductsPricesRequest(
            $codes,
            $id,
            $ids,
            $variantCodes,
            $lastUpdateTimeFrom,
            $active,
            $archived,
            $canAddToBasket,
            $excludeFromSearch,
            $inStock,
            $language,
            $languages,
            $pricelist,
            $variants
        );

        return $this->connector->paginate($request)->items();
    }

    public function listParameters(
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?bool $archived = null,
        ?bool $canAddToBasket = null,
        ?bool $excludeFromSearch = null,
        ?bool $inStock = null,
        ?string $language = null,
        ?array $languages = null,
        ?bool $variants = null,
    ): iterable {
        $request = new ListProductsParametersRequest(
            $codes,
            $id,
            $ids,
            $variantCodes,
            $lastUpdateTimeFrom,
            $active,
            $archived,
            $canAddToBasket,
            $excludeFromSearch,
            $inStock,
            $language,
            $languages,
            $variants
        );

        return $this->connector->paginate($request)->items();
    }

    public function listLabels(
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?bool $archived = null,
        ?bool $canAddToBasket = null,
        ?bool $excludeFromSearch = null,
        ?bool $inStock = null,
        ?string $language = null,
        ?array $languages = null,
        ?bool $variants = null,
    ): iterable {
        $request = new ListProductsLabelsRequest(
            $codes,
            $id,
            $ids,
            $variantCodes,
            $lastUpdateTimeFrom,
            $active,
            $archived,
            $canAddToBasket,
            $excludeFromSearch,
            $inStock,
            $language,
            $languages,
            $variants
        );

        return $this->connector->paginate($request)->items();
    }

    public function listFiles(
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $active = null,
        ?bool $archived = null,
        ?bool $canAddToBasket = null,
        ?bool $excludeFromSearch = null,
        ?bool $inStock = null,
        ?string $language = null,
        ?array $languages = null,
        ?bool $withFiles = null,
    ): iterable {
        $request = new ListProductsFilesRequest(
            $codes,
            $id,
            $ids,
            $variantCodes,
            $lastUpdateTimeFrom,
            $active,
            $archived,
            $canAddToBasket,
            $excludeFromSearch,
            $inStock,
            $language,
            $languages,
            $withFiles
        );

        return $this->connector->paginate($request)->items();
    }

    public function listVariants(
        ?array $codes = null,
        ?string $id = null,
        ?array $ids = null,
        ?array $variantCodes = null,
        ?bool $active = null,
        ?bool $canAddToBasket = null,
        ?bool $inStock = null,
        ?string $language = null,
        ?array $languages = null,
        ?string $pricelist = null,
    ): iterable {
        $request = new ListProductsVariantsRequest(
            $codes,
            $id,
            $ids,
            $variantCodes,
            $active,
            $canAddToBasket,
            $inStock,
            $language,
            $languages,
            $pricelist,
        );

        return $this->connector->paginate($request)->items();
    }

    public function listRatingsReviews(?string $productCode = null, ?string $customerEmail = null): iterable
    {
        $request = new ListProductsRatingsReviewsRequest($productCode, $customerEmail);

        return $this->connector->paginate($request)->items();
    }

    public function createRatingReview(string $productCode, string $customerEmail, int $ratingScore, ?array $reviewData = null): array
    {
        $request = new CreateProductRatingReviewRequest($productCode, $customerEmail, $ratingScore, $reviewData);

        return $this->connector->send($request)->array('ratings_reviews', []);
    }

    public function deleteRatingsReviews(?int $id = null, ?array $ids = null): array
    {
        $request = new DeleteProductRatingsReviewsRequest($id, $ids);

        return $this->connector->send($request)->array('ratings_reviews', []);
    }
}

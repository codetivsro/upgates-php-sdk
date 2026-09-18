<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk;

use Codetiv\Upgates\Sdk\Concerns\HasArticlesResource;
use Codetiv\Upgates\Sdk\Concerns\HasAvailabilitiesResource;
use Codetiv\Upgates\Sdk\Concerns\HasCartsResource;
use Codetiv\Upgates\Sdk\Concerns\HasCategoriesResource;
use Codetiv\Upgates\Sdk\Concerns\HasConversionCodesResource;
use Codetiv\Upgates\Sdk\Concerns\HasCustomerGroupsResource;
use Codetiv\Upgates\Sdk\Concerns\HasCustomersResource;
use Codetiv\Upgates\Sdk\Concerns\HasInvoicesResource;
use Codetiv\Upgates\Sdk\Concerns\HasLabelsResource;
use Codetiv\Upgates\Sdk\Concerns\HasLanguagesResource;
use Codetiv\Upgates\Sdk\Concerns\HasManufacturersResource;
use Codetiv\Upgates\Sdk\Concerns\HasMetasResource;
use Codetiv\Upgates\Sdk\Concerns\HasNewsResource;
use Codetiv\Upgates\Sdk\Concerns\HasOrdersResource;
use Codetiv\Upgates\Sdk\Concerns\HasOrderStatusesResource;
use Codetiv\Upgates\Sdk\Concerns\HasOwnerRequest;
use Codetiv\Upgates\Sdk\Concerns\HasParametersResource;
use Codetiv\Upgates\Sdk\Concerns\HasPriceListsResource;
use Codetiv\Upgates\Sdk\Concerns\HasProductsResource;
use Codetiv\Upgates\Sdk\Concerns\HasShipmentsResource;
use Codetiv\Upgates\Sdk\Concerns\HasStatusRequest;
use Codetiv\Upgates\Sdk\Concerns\HasStocksResource;
use Codetiv\Upgates\Sdk\Concerns\HasStoreConfigRequest;
use Codetiv\Upgates\Sdk\Concerns\HasUsersResource;
use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Exceptions\UpgatesApiException;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\PaginationPlugin\Paginator;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Throwable;

final class Upgates extends Connector implements HasPagination
{
    use AlwaysThrowOnErrors;
    use HasArticlesResource;
    use HasAvailabilitiesResource;
    use HasCartsResource;
    use HasCategoriesResource;
    use HasConversionCodesResource;
    use HasCustomerGroupsResource;
    use HasCustomersResource;
    use HasInvoicesResource;
    use HasLabelsResource;
    use HasLanguagesResource;
    use HasManufacturersResource;
    use HasMetasResource;
    use HasNewsResource;
    use HasOrdersResource;
    use HasOrderStatusesResource;
    use HasOwnerRequest;
    use HasParametersResource;
    use HasPriceListsResource;
    use HasProductsResource;
    use HasShipmentsResource;
    use HasStatusRequest;
    use HasStocksResource;
    use HasStoreConfigRequest;
    use HasUsersResource;

    public function __construct(
        public readonly string $storeName,
        public readonly string $serverMark,
        public readonly string $apiLogin,
        public readonly string $apiKey,
    ) {

    }

    public function resolveBaseUrl(): string
    {
        return sprintf('https://%s.admin.%s.upgates.com/api/v2', $this->storeName, $this->serverMark);
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        return new UpgatesApiException(
            $response,
            $senderException?->getMessage() ?? 'API request failed',
            $senderException?->getCode() ?? 0,
        );
    }

    public function paginate(Request $request): Paginator
    {
        return new class (connector: $this, request: $request) extends PagedPaginator {
            protected function isLastPage(Response $response): bool
            {
                $currentPage = $response->json('current_page');
                $lastPage = $response->json('number_of_pages');

                return $currentPage === $lastPage;
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                assert($request instanceof HasCustomPaginatedItems);

                return $request->getItemsFromResponse($response);
            }

            protected function applyPagination(Request $request): Request
            {
                $request->query()->add('page', $this->currentPage);

                if (isset($this->perPageLimit)) {
                    $request->query()->add('current_page_items', $this->perPageLimit);
                }

                return $request;
            }
        };
    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator($this->apiLogin, $this->apiKey);
    }
}

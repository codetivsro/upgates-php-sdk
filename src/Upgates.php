<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk;

use Codetiv\Upgates\Sdk\Concerns\HasNewsResource;
use Codetiv\Upgates\Sdk\Concerns\HasStatusRequest;
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
    use HasNewsResource;
    use HasStatusRequest;

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

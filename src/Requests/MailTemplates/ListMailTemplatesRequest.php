<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\MailTemplates;

use Codetiv\Upgates\Sdk\Contracts\HasCustomPaginatedItems;
use Codetiv\Upgates\Sdk\Support\Helpers;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

final class ListMailTemplatesRequest extends Request implements HasCustomPaginatedItems, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?array $ids = null,
        protected ?string $name = null,
        protected ?bool $default = null,
        protected ?bool $sendWithOrder = null,
        protected ?string $creationTimeFrom = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/mail-templates';
    }

    public function getItemsFromResponse(Response $response): array
    {
        return $response->array('mail_templates', []);
    }

    protected function defaultQuery(): array
    {
        return [
            'ids' => $this->ids ? implode(';', $this->ids) : null,
            'name' => $this->name,
            'default_yn' => $this->default,
            'send_with_order_yn' => $this->sendWithOrder,
            'creation_time_from' => Helpers::convertQueryDateFormatOrNull($this->creationTimeFrom),
        ];
    }
}

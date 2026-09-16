<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\DocumentType;
use Codetiv\Upgates\Sdk\Requests\Invoices\GetInvoiceRequest;
use Codetiv\Upgates\Sdk\Requests\Invoices\ListInvoicesRequest;
use Codetiv\Upgates\Sdk\Requests\Invoices\ViewPdfInvoiceRequest;
use Psr\Http\Message\StreamInterface;
use Saloon\Http\BaseResource;

final class InvoicesResource extends BaseResource
{
    public function list(
        ?array $invoiceNumbers = null,
        ?string $creationTimeFrom = null,
        ?string $creationTimeTo = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $paid = null,
        ?DocumentType $type = null,
        ?string $orderNumber = null,
    ): iterable {
        $request = new ListInvoicesRequest(
            $invoiceNumbers,
            $creationTimeFrom,
            $creationTimeTo,
            $lastUpdateTimeFrom,
            $paid,
            $type,
            $orderNumber
        );

        return $this->connector->paginate($request)->items();
    }

    public function get(string $number): array
    {
        $request = new GetInvoiceRequest($number);

        return $this->connector->send($request)->array('invoices', []);
    }

    public function pdf(string $number, ?string $savePath = null): StreamInterface|string
    {
        $request = new ViewPdfInvoiceRequest($number);

        $response = $this->connector->send($request);

        if ($savePath) {
            $response->saveBodyToFile($savePath);

            return $savePath;
        }

        return $response->stream();
    }
}

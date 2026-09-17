<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\PaymentType;
use Codetiv\Upgates\Sdk\Enums\ShipmentType;
use Codetiv\Upgates\Sdk\Requests\Orders\CreateOrderHistoryRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\CreateOrdersRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\CreateOrderUrlsRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\DeleteOrderAttachmentsRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\DeleteOrdersRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\GetOrderRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\ListOrderHistoryRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\ListOrdersRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\UpdateOrdersRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\UploadOrderFileRequest;
use Codetiv\Upgates\Sdk\Requests\Orders\ViewPdfOrderRequest;
use Psr\Http\Message\StreamInterface;
use Saloon\Http\BaseResource;

final class OrdersResource extends BaseResource
{
    public function list(
        ?array $orderNumbers = null,
        ?string $creationTimeFrom = null,
        ?string $creationTimeTo = null,
        ?string $lastUpdateTimeFrom = null,
        ?bool $paid = null,
        ?bool $delivered = null,
        ?bool $deleted = null,
        ?string $status = null,
        ?string $statusId = null,
        ?array $statusIds = null,
        ?string $language = null,
        ?string $email = null,
        ?string $phone = null,
        ?string $externalOrderNumber = null,
        ?PaymentType $paymentType = null,
        ?ShipmentType $shipmentType = null,
    ): iterable {
        $request = new ListOrdersRequest(
            $orderNumbers,
            $creationTimeFrom,
            $creationTimeTo,
            $lastUpdateTimeFrom,
            $paid,
            $delivered,
            $deleted,
            $status,
            $statusId,
            $statusIds,
            $language,
            $email,
            $phone,
            $externalOrderNumber,
            $paymentType,
            $shipmentType
        );

        return $this->connector->paginate($request)->items();
    }

    public function update(array $data, bool $sendEmails = true, bool $sendSms = true, bool $deleteMissingProducts = false): array
    {
        $request = new UpdateOrdersRequest($data, $sendEmails, $sendSms, $deleteMissingProducts);

        return $this->connector->send($request)->array('orders', []);
    }

    public function create(array $data, bool $sendEmails = true, bool $sendSms = true): array
    {
        $request = new CreateOrdersRequest($data, $sendEmails, $sendSms);

        return $this->connector->send($request)->array('orders', []);
    }

    public function delete(?string $number = null, ?array $numbers = null, ?bool $completeDelete = null): array
    {
        $request = new DeleteOrdersRequest($number, $numbers, $completeDelete);

        return $this->connector->send($request)->array('orders', []);
    }

    public function get(string $number): array
    {
        $request = new GetOrderRequest($number);

        return $this->connector->send($request)->array('orders', []);
    }

    public function pdf(string $number, ?string $savePath = null): StreamInterface|string
    {
        $request = new ViewPdfOrderRequest($number);

        $response = $this->connector->send($request);

        if ($savePath) {
            $response->saveBodyToFile($savePath);

            return $savePath;
        }

        return $response->stream();
    }

    public function listHistory(string $number): array
    {
        $request = new ListOrderHistoryRequest($number);

        return $this->connector->send($request)->array('history', []);
    }

    public function createHistory(string $number, array $data): array
    {
        $request = new CreateOrderHistoryRequest($number, $data);

        return $this->connector->send($request)->array(default: []);
    }

    public function uploadFile(string $number, string $filePath, ?string $fileName = null, ?string $code = null): array
    {
        $request = new UploadOrderFileRequest($number, $filePath, $fileName, $code);

        return $this->connector->send($request)->array(default: []);
    }

    public function createUrls(string $number, array $data): array
    {
        $request = new CreateOrderUrlsRequest($number, $data);

        return $this->connector->send($request)->array(default: []);
    }

    public function deleteAttachments(string $number, int ... $ids): array
    {
        $request = new DeleteOrderAttachmentsRequest($number, $ids);

        return $this->connector->send($request)->array('attachments', []);
    }
}

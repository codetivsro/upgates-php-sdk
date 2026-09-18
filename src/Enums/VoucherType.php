<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum VoucherType: string
{
    case Price = 'price';
    case Percentage = 'percentage';
    case PaymentShipment = 'payment_shipment';
}

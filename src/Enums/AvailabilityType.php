<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum AvailabilityType: string
{
    case OnRequest = 'OnRequest';
    case NotAvailable = 'NotAvailable';
    case InStock = 'InStock';
    case Custom = 'Custom';
}

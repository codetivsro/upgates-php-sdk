<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum DocumentType: string
{
    case Invoice = 'invoice';
    case CreditNote = 'creditNote';
    case Receipt = 'receipt';
}

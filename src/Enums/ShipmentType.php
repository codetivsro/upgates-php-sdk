<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum ShipmentType: string
{
    case CeskaPosta = 'ceskaPosta';
    case Balikovna = 'balikovna';
    case SlovenskaPosta = 'slovenskaPosta';
    case Sps = 'sps';
    case Zasilkovna = 'zasilkovna';
    case Dpd = 'dpd';
    case Ppl = 'ppl';
    case Gls = 'gls';
    case Wedo = 'wedo';
    case Depo = 'depo';
    case Custom = 'custom';
    case Individual = 'individual';
}

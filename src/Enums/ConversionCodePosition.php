<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum ConversionCodePosition: string
{
    case Head = 'head';
    case BodyTop = 'body_top';
    case BodyBottom = 'body_bottom';
    case OrderHead = 'order_head';
    case OrderBodyTop = 'order_body_top';
    case OrderBodyBottom = 'order_body_bottom';
}

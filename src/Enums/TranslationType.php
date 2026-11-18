<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum TranslationType: string
{
    case String = 'string';
    case Formatted = 'formatted';
    case Code = 'code';
}

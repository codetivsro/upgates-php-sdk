<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum LabelType: string
{
    case Action = 'action';
    case New = 'new';
    case Sale = 'sale';
    case Custom = 'custom';
}

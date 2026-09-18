<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum RedirectionType: string
{
    case Custom = 'Custom';
    case Product = 'Product';
    case Variant = 'Variant';
    case Advisor = 'Advisor';
    case Article = 'Article';
    case Category = 'Category';
    case News = 'News';
}

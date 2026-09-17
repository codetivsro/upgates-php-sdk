<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum MetaCategory: string
{
    case Advices = 'advices';
    case Articles = 'articles';
    case Category = 'category';
    case Customers = 'customers';
    case Homepage = 'homepage';
    case News = 'news';
    case Orders = 'orders';
    case Payment = 'payment';
}

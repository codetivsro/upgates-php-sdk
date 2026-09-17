<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum CategoryType: string
{
    case Homepage = 'homepage';
    case News = 'news';
    case Individual = 'individual';
    case Url = 'url';
    case Site = 'site';
    case SiteWithProducts = 'siteWithProducts';
    case Parametric = 'parametric';
    case LinkCategory = 'linkCategory';
    case Advisor = 'advisor';
    case WhyUs = 'why-us';
    case Contact = 'contact';
    case Manufacturers = 'manufacturers';
    case ContactMenu = 'contactMenu';
}

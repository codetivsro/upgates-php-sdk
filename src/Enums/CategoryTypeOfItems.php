<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum CategoryTypeOfItems: string
{
    case WithSubcategories = 'withSubcategories';
    case WithoutSubcategories = 'withoutSubcategories';
    case Label = 'label';
    case Manufacturer = 'manufacturer';
}

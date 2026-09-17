<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Enums;

enum MetaType: string
{
    case Checkbox = 'checkbox';
    case RadioList = 'radiolist';
    case Input = 'input';
    case Date = 'date';
    case Email = 'email';
    case Number = 'number';
    case Textarea = 'textarea';
    case Formatted = 'formatted';
    case Select = 'select';
    case MultiSelect = 'multiselect';
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Support;

use Carbon\Carbon;

final class Helpers
{
    public static function convertQueryDateFormatOrNull(?string $value): ?string
    {
        return $value ? Carbon::parse($value)->toIso8601String() : null;
    }
}

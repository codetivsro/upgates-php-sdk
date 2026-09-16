<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Exceptions;

use Exception;
use Saloon\Http\Response;

final class UpgatesApiException extends Exception
{
    public function __construct(
        public Response $response,
        string $message,
        int $code,
    ) {
        parent::__construct($message, $code);
    }
}

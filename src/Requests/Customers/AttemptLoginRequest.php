<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Requests\Customers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use SensitiveParameter;

final class AttemptLoginRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $email,
        #[SensitiveParameter] protected string $password
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/customers/login';
    }

    protected function defaultBody(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\ConversionCodePosition;
use Codetiv\Upgates\Sdk\Requests\ConversionCodes\CreateConversionCodeRequest;
use Codetiv\Upgates\Sdk\Requests\ConversionCodes\DeleteConversionCodeRequest;
use Codetiv\Upgates\Sdk\Requests\ConversionCodes\GetConversionCodeRequest;
use Codetiv\Upgates\Sdk\Requests\ConversionCodes\ListConversionCodesRequest;
use Codetiv\Upgates\Sdk\Requests\ConversionCodes\UpdateConversionCodeRequest;
use Saloon\Http\BaseResource;

final class ConversionCodesResource extends BaseResource
{
    public function list(?string $language = null): array
    {
        $request = new ListConversionCodesRequest($language);

        return $this->connector->send($request)->array('conversion_codes', []);
    }

    public function update(ConversionCodePosition $position, string $language, string $code): array
    {
        $request = new UpdateConversionCodeRequest($position, $language, $code);

        return $this->connector->send($request)->array('conversion_codes', []);
    }

    public function create(ConversionCodePosition $position, string $language, string $code): array
    {
        $request = new CreateConversionCodeRequest($position, $language, $code);

        return $this->connector->send($request)->array('conversion_codes', []);
    }

    public function get(ConversionCodePosition $position): array
    {
        $request = new GetConversionCodeRequest($position);

        return $this->connector->send($request)->array('conversion_codes', []);
    }

    public function delete(ConversionCodePosition $position, ?string $language = null): array
    {
        $request = new DeleteConversionCodeRequest($position, $language);

        return $this->connector->send($request)->array('conversion_codes', []);
    }
}

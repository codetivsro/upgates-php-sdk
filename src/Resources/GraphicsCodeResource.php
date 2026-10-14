<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Enums\GraphicsCodeType;
use Codetiv\Upgates\Sdk\Requests\GraphicsCode\CreateGraphicsCodeRequest;
use Codetiv\Upgates\Sdk\Requests\GraphicsCode\DeleteGraphicsCodeRequest;
use Codetiv\Upgates\Sdk\Requests\GraphicsCode\GetGraphicsCodeRequest;
use Codetiv\Upgates\Sdk\Requests\GraphicsCode\UpdateGraphicsCodeRequest;
use Saloon\Http\BaseResource;

final class GraphicsCodeResource extends BaseResource
{
    public function get(string $path): array
    {
        $request = new GetGraphicsCodeRequest($path);

        return $this->connector->send($request)->array(default: []);
    }

    public function update(string $path, string $content): array
    {
        $request = new UpdateGraphicsCodeRequest($path, $content);

        return $this->connector->send($request)->array(default: []);
    }

    public function create(string $path, GraphicsCodeType $type, ?string $content = null): array
    {
        $request = new CreateGraphicsCodeRequest($path, $type, $content);

        return $this->connector->send($request)->array(default: []);
    }

    public function delete(string $path): array
    {
        $request = new DeleteGraphicsCodeRequest($path);

        return $this->connector->send($request)->array(default: []);
    }
}

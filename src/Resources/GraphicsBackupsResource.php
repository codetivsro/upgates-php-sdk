<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\GraphicsBackups\CreateGraphicsBackupRequest;
use Codetiv\Upgates\Sdk\Requests\GraphicsBackups\DeleteGraphicsBackupRequest;
use Codetiv\Upgates\Sdk\Requests\GraphicsBackups\ListGraphicsBackupsRequest;
use Codetiv\Upgates\Sdk\Requests\GraphicsBackups\RestoreGraphicsBackupRequest;
use Saloon\Http\BaseResource;

final class GraphicsBackupsResource extends BaseResource
{
    public function list(): array
    {
        $request = new ListGraphicsBackupsRequest();

        return $this->connector->send($request)->array('backups', []);
    }

    public function restore(string $token): array
    {
        $request = new RestoreGraphicsBackupRequest($token);

        return $this->connector->send($request)->array(default: []);
    }

    public function create(string $name): array
    {
        $request = new CreateGraphicsBackupRequest($name);

        return $this->connector->send($request)->array(default: []);
    }

    public function delete(string $token): array
    {
        $request = new DeleteGraphicsBackupRequest($token);

        return $this->connector->send($request)->array(default: []);
    }
}

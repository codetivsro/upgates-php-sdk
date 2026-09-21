<?php

declare(strict_types=1);

namespace Codetiv\Upgates\Sdk\Resources;

use Codetiv\Upgates\Sdk\Requests\Categories\ListCategoriesRequest;
use Codetiv\Upgates\Sdk\Requests\Files\DeleteFileRequest;
use Codetiv\Upgates\Sdk\Requests\Files\GetFileRequest;
use Codetiv\Upgates\Sdk\Requests\Files\ListFilesCategoriesRequest;
use Codetiv\Upgates\Sdk\Requests\Files\ListFilesResource;
use Codetiv\Upgates\Sdk\Requests\Files\UploadFileRequest;
use Saloon\Http\BaseResource;

final class FilesResource extends BaseResource
{
    public function list(?array $ids = null, ?string $type = null, ?int $categoryId = null, ?bool $deleted = null): iterable
    {
        $request = new ListFilesResource($ids, $type, $categoryId, $deleted);

        return $this->connector->paginate($request)->items();
    }

    public function upload(string $filePath, ?string $fileName = null, ?int $categoryId = null): array
    {
        $request = new UploadFileRequest($filePath, $fileName, $categoryId);

        return $this->connector->send($request)->array(default: []);
    }

    public function get(int $id): array
    {
        $request = new GetFileRequest($id);

        return $this->connector->send($request)->array('files', []);
    }

    public function delete(int $id): array
    {
        $request = new DeleteFileRequest($id);

        return $this->connector->send($request)->array('files', []);
    }

    public function listCategories(?int $id = null, ?array $ids = null): iterable
    {
        $request = new ListFilesCategoriesRequest($id, $ids);

        return $this->connector->paginate($request)->items();
    }
}

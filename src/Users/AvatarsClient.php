<?php

declare(strict_types=1);

namespace Deviate\Clients\Users;

use Deviate\Clients\Users\Contracts\AvatarsClientInterface;
use Deviate\Clients\AbstractClient;
use Deviate\Clients\Responses\ApiResponseInterface;
use Illuminate\Http\UploadedFile;

class AvatarsClient extends AbstractClient implements AvatarsClientInterface
{
    public function addAvatar(int $userId, UploadedFile $file): ApiResponseInterface
    {
        return $this->call('users.avatars.upload', [
            'id'      => $userId,
            'content' => base64_encode(file_get_contents($file->path())),
        ]);
    }

    public function addDefaultAvatar(int $userId): ApiResponseInterface
    {
        return $this->call('users.avatars.create_default', [
            'id' => $userId,
        ]);
    }

    public function deleteAvatar(int $userId): ApiResponseInterface
    {
        return $this->call('users.avatars.delete', [
            'id' => $userId,
        ]);
    }

    public function fetchAvatar(int $userId): ApiResponseInterface
    {
        return $this->call('users.avatars.fetch', [
            'id' => $userId,
        ]);
    }
}

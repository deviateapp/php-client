<?php

namespace Deviate\Clients\Clients;

use Deviate\Clients\AbstractClient;
use Deviate\Clients\Contracts\AvatarsClientInterface;
use Deviate\Clients\Responses\ApiResponseInterface;
use Illuminate\Http\UploadedFile;

class AvatarsClient extends AbstractClient implements AvatarsClientInterface
{
    public function addAvatar(int $userId, UploadedFile $file): ApiResponseInterface
    {
        return $this->call('POST', '/users/' . $userId . '/avatars', [
            'content' => base64_encode(file_get_contents($file->path())),
        ]);
    }

    public function addDefaultAvatar(int $userId): ApiResponseInterface
    {
        return $this->call('POST', '/users/' . $userId . '/avatars', [
            'content' => null,
        ]);
    }

    public function deleteAvatar(int $userId): ApiResponseInterface
    {
        return $this->call('DELETE', '/users/' . $userId . '/avatars');
    }

    public function fetchAvatar(int $userId): ApiResponseInterface
    {
        return $this->call('GET', '/users/' . $userId . '/avatars');
    }
}

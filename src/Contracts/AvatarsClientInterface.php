<?php

namespace Deviate\Clients\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;
use Illuminate\Http\UploadedFile;

interface AvatarsClientInterface
{
    public function addAvatar(int $userId, UploadedFile $file): ApiResponseInterface;

    public function addDefaultAvatar(int $userId): ApiResponseInterface;

    public function deleteAvatar(int $userId): ApiResponseInterface;

    public function fetchAvatar(int $userId): ApiResponseInterface;
}

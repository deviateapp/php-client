<?php

namespace Deviate\Clients\Users\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface DeletesUsersClientInterface
{
    public function deleteUser(int $userId): ApiResponseInterface;
}

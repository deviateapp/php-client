<?php

namespace Deviate\Clients\Users\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface AuthenticatesUsersClientInterface
{
    public function validatePassword(int $userId, string $password): ApiResponseInterface;
}

<?php

namespace Deviate\Clients\Users\Contracts;

use Deviate\Clients\Responses\ApiResponseInterface;

interface FetchesUsersClientInterface
{
    public function fetchUserById(int $id): ApiResponseInterface;
    public function fetchUserByRememberToken(int $organisationId, string $token): ApiResponseInterface;
}
